<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TimelinePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelinePostController extends Controller
{
    public function postsByCourse($courseId)
    {

        $course = Course::find($courseId);

        // Retrieve timeline posts for a specific course
        $timelinePosts = TimelinePost::where('course_id', $courseId)->get();

        return view('frontend.timeline_posts.index', compact('course', 'timelinePosts'));
    }

    public function create($courseId)
    {

        //pass the course to the view
        $course = Course::find($courseId);

        // Display the form to create a new timeline post
        return view('frontend.timeline_posts.create', compact('course'));
    }

    public function store(Request $request)
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();

        // Validate and store a new timeline post
        $validatedData = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'file' => 'nullable',
            'course_id' => 'required',
        ]);

        // Include the user_id in the validated data
        $validatedData['user_id'] = $userId;

        TimelinePost::create($validatedData);

        // Redirect back to the course's timeline page by passing the course ID
        return redirect()->route('timeline_posts.byCourse', ['courseId' => $validatedData['course_id']])->with('message', 'Timeline post created successfully.');
    }

    public function show($id)
    {
        // Show a specific timeline post
        $timelinePost = TimelinePost::findOrFail($id);

        return view('timeline_posts.show', compact('timelinePost'));
    }

    public function myPostsByCourse($courseId)
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();

        $course = Course::find($courseId);

        // Retrieve timeline posts for the specific course created by the authenticated user
        $timelinePosts = TimelinePost::where('course_id', $courseId)
            ->where('user_id', $userId)
            ->get();

        return view('frontend.timeline_posts.myPostsByCourse', compact('course', 'timelinePosts'));
    }

    public function destroy($id)
    {
        // Find the timeline post by its ID
        $timelinePost = TimelinePost::findOrFail($id);

        // Check if the currently authenticated user is the owner of the post
        $user = Auth::user();

        if ($timelinePost->user_id !== $user->id) {
            // Redirect with an error message if the user is not the owner
            return redirect()->route('timeline_posts.byCourse', ['courseId' => $timelinePost->course_id])
                ->with('message', 'You do not have permission to delete this post.');
        }

        // Delete the timeline post record
        $timelinePost->delete();

        return redirect()->route('timeline_posts.byCourse', ['courseId' => $timelinePost->course_id])
            ->with('message', 'Timeline post deleted successfully.');
    }

    // Add other methods for editing, updating, and deleting timeline posts

}
