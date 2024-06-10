<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function create($courseId)
    {
        // Get the course by its ID
        $course = Course::find($courseId);

        return view('frontend.exams.create', compact('course'));
    }

    public function examByCourse($courseId)
    {
        $course = Course::find($courseId);
        // Fetch all exams for the specified course
        $exams = Exam::where('course_id', $courseId)->get();

        $user = auth()->user(); // Get the authenticated user

        // Pass the exams and course information to the view
        return view('frontend.exams.index', compact('exams', 'course', 'user'));
    }

    public function store(Request $request, $courseId)
    {
        $user = auth()->user(); // Get the authenticated user

        $course = Course::find($courseId);

        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date_format:Y-m-d\TH:i',
            'end_date' => 'required|date_format:Y-m-d\TH:i',
            'course_id' => 'required',
        ]);
        //dd($validatedData);
        // Include the authenticated user's ID as the creator
        $validatedData['created_by'] = $user->id;

        // Create a new exam record in the database
        Exam::create($validatedData);

        // Redirect to a success page or do something else, e.g., show a success message.
        return redirect()->route('exam.byCourse', $course->course_id)->with('message', 'Exam created successfully.');
    }

    public function show($examId)
    {
        // Retrieve the exam by its ID
        $exam = Exam::findOrFail($examId);

        // Get the course associated with the exam
        $course = $exam->course;

        return view('frontend.exams.show', compact('exam', 'course'));
    }

}
