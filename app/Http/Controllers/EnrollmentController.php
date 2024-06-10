<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    //

    public function store(Request $request)
    {
        // Get the current authenticated user
        $user = Auth::user();

        // Validate the form data if needed
        // You can add validation rules here

        // Get the course ID from the form or request
        $courseId = $request->input('course_id');

        // Check if the course is posted by the currently authenticated user
        $course = Course::find($courseId);

        if ($course && $course->teacher_id === $user->id) {
            // Redirect to the index with a message if the user is trying to enroll in their own course
            return redirect()->route('courses.index')->with('message', 'You cannot enroll in your own course.');
        }

        try {
            // Create a new enrollment
            $enrollment = new Enrollment([
                'user_id' => $user->id,
                'course_id' => $courseId,
                'status' => 'pending', // You can set the initial status as needed
            ]);

            $enrollment->save();

            // Redirect to a success page or do something else
            return redirect()->route('courses.index')->with('message', 'Enrollment successful.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle the uniqueness violation
            return redirect()->route('courses.index')->with('message', 'You are already enrolled in this course.');
        }
    }

    public function showEnrollment($id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($id);

        // Get the currently logged-in user
        $user = Auth::user();

        // Check if the course belongs to the currently logged-in user
        if ($course->teacher_id !== $user->id) {
            // Redirect with an error message if the course doesn't belong to the user
            return redirect()->route('courses.index')->with('message', 'You do not have permission to view enrollments for this course.');
        }

        // Retrieve the list of enrolled users for the course
        $enrolledUsers = Enrollment::where('course_id', $course->course_id)->get();

        return view('frontend.enrollments.showEnrollment', compact('course', 'enrolledUsers'));
    }

    public function acceptEnrollment($id)
    {
        // Find the enrollment by its ID
        $enrollment = Enrollment::findOrFail($id);

        // Check if the currently authenticated user is the teacher of the course
        $user = Auth::user();
        $course = $enrollment->course;

        if ($course->teacher_id !== $user->id) {
            // Redirect with an error message if the user is not the teacher
            return redirect()->route('courses.index', $course->id)->with('message', 'You do not have permission to accept this enrollment.');
        }

        // Update the enrollment status to 'accepted'
        $enrollment->status = 'accepted';
        $enrollment->save();

        return redirect()->route('courses.showEnrollment', $course->course_id)->with('message', 'Enrollment accepted.');
    }

    public function removeEnrollment($id)
    {
        // Find the enrollment by its ID
        $enrollment = Enrollment::findOrFail($id);

        // Check if the currently authenticated user is the teacher of the course
        $user = Auth::user();
        $course = $enrollment->course;

        if ($course->teacher_id !== $user->id) {
            // Redirect with an error message if the user is not the teacher
            return redirect()->route('courses.index', $course->id)->with('message', 'You do not have permission to remove this enrollment.');
        }

        // Delete the enrollment record
        $enrollment->delete();

        return redirect()->route('courses.showEnrollment', $course->course_id)->with('message', 'Enrollment removed.');
    }

    public function myEnrollments()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        // Retrieve accepted enrollments for the user
        $acceptedEnrollments = Enrollment::where('user_id', $user->id)
            ->where('status', 'accepted')
            ->with('course') // Eager load the associated course
            ->get();

        // Retrieve pending enrollments for the user
        $pendingEnrollments = Enrollment::where('user_id', $user->id)
            ->where('status', 'pending')
            ->with('course') // Eager load the associated course
            ->get();

        return view('frontend.enrollments.myEnrollments', compact('acceptedEnrollments', 'pendingEnrollments'));
    }

    public function isUserEnrolled($userId)
    {
        // Check if the user is enrolled in this course
        return $this->enrollments()->where('user_id', $userId)->where('status', 'accepted')->count() > 0;
    }
    public function coursePeople($courseId)
    {
        // Find the course by its ID
        $course = Course::findOrFail($courseId);
    
        // Get the currently logged-in user
        $user = Auth::user();
    
        // Check if the user is the teacher of the course or enrolled in the course
        if ($course->teacher_id === $user->id || $user->enrollments->contains('course_id', $course->course_id)) {
            // Retrieve the list of enrolled users for the course with their names and emails
            $enrolledUsers = Enrollment::where('course_id', $courseId)
                ->where('status', 'accepted')
                ->with('user:id,name,email') // Eager load the associated user and select only name and email
                ->get();
    
            return view('frontend.timeline_posts.all-people', compact('course', 'enrolledUsers'));
        } else {
            // Redirect with an error message if the user does not have permission
            return redirect()->route('courses.index')->with('message', 'You do not have permission to view people for this course.');
        }
    }
    

}
