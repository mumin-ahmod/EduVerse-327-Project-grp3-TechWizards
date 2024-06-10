<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        // Fetch the courses from the database and order them by a specific column, e.g., 'start_date'.
        $courses = Course::orderBy('start_date', 'asc')->get();

        return view('frontend.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('frontend.courses.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming data

        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // You can adjust the image validation as needed.
            'category_id' => 'required|in:IT,Business,Design,Humanities',
            'teacher_id' => 'required|exists:users,id', // Make sure users exist in your database.
            'start_date' => 'required|date',
            'level' => 'required|in:Basic,Primary,High School,College,Higher Education',
            'trailer_link' => 'nullable', // URL validation and nullable
        ]);

        // Handle the uploaded image
        if ($request->hasFile('course_image')) {
            $imagePath = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $imagePath;
        }

        // Create a new course record in the database // sql aulternter
        Course::create($validatedData);

        // Redirect to a success page or do something else, e.g., show a success message.
        return redirect()->route('courses.index')->with('message', 'Course created successfully.');
    }

    public function myCourses()
    {

        // Retrieve the logged-in user.
        $user = Auth::user();

        // Get all courses posted by the logged-in user.
        $courses = Course::where('teacher_id', $user->id)->get();

        return view('frontend.courses.myCourses', compact('courses'));
    }

    public function destroy($id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($id);

        // Delete the course from the database


        try{

    
        $course->delete();

        return redirect()->route('courses.myCourses')->with('message', 'Course deleted successfully.');

    }catch (\Exception $e) {
        return redirect()->route('courses.myCourses')->with('message', 'Remove all the Students and Course Data first');
    }
    
    }

    public function show($id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($id);

        return view('frontend.courses.show', compact('course'));
    }

    public function edit($id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($id);

        return view('frontend.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|in:it,business,design,humanities',
            'start_date' => 'required|date',
            'level' => 'required|in:basic,primary,high_school,college,higher_education',
            'trailer_link' => 'nullable|url',
        ]);

        // Handle the uploaded image
        if ($request->hasFile('course_image')) {
            $imagePath = $request->file('course_image')->store('course_images', 'public');
            $validatedData['course_image'] = $imagePath;
        } else {
            // If no new image is provided, keep the existing image path
            $validatedData['course_image'] = $course->course_image;
        }

        // Update the course with the validated data
        $course->update($validatedData);

        return redirect()->route('courses.myCourses')->with('message', 'Course updated successfully.');
    }

    public function categoryCourses($category)
    {
        // Find courses with the specified category
        $courses = Course::where('category_id', $category)->get();

        return view('frontend.courses.index', compact('courses'));
    }

    public function levelCourses($level)
    {
        // Find courses with the specified level
        $courses = Course::where('level', $level)->get();

        return view('frontend.courses.index', compact('courses'));
    }

    public function catView()
    { 
        //dd('cat');
        return view('frontend.courses.cat-list');
    }

    public function levelView()
    {
        
        return view('frontend.courses.level-list');
    }




}
