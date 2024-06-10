<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($examId)
    {
        // Retrieve questions for the specified exam
        $questions = Question::where('exam_id', $examId)->get();

       // dd($questions);
    
        // Separate MCQ and Written questions
        $mcqQuestions = $questions->where('qtype', 'multiple_choice');
        $writtenQuestions = $questions->where('qtype', 'written');
    
        // Pass the questions and the related exam information to the view
        $exam = Exam::find($examId);
    
        return view('frontend.questions.index', compact('mcqQuestions', 'writtenQuestions', 'exam', 'questions'));
    }
    
    

    public function create($examId)
    {
        // Get the exam by its ID
        $exam = Exam::find($examId);

        return view('frontend.questions.create', compact('exam'));
    }

    public function store(Request $request, $examId)
    {

      
       
        // Validate the incoming data
        $validatedData = $request->validate([
            'question_text' => 'required|string',
            'qtype' => 'required|string',
            'options' => 'nullable|string',
            'filename' => 'nullable|string',
        ]);

      
    
        // Split options into an array using newlines
       // Convert the options string to an array (one option per line)
    $optionsArray = $validatedData['options'] ? preg_split('/\r\n|\r|\n/', $validatedData['options']) : null;
    
        // Create a new question record in the database
        Question::create([
            'exam_id' => $examId,
            'question_text' => $validatedData['question_text'],
            'qtype' => $validatedData['qtype'],
            'options' => json_encode($optionsArray) ?? null, // Store options as a JSON array
            'filename' => $validatedData['filename'] ?? null,
            'posted_by' => auth()->user()->id, // Assuming you want to associate the question with the authenticated user
        ]);
    
        // Redirect to the questions index for the same exam
        return redirect()->route('question.index', $examId)->with('message', 'Question created successfully.');
    }

    public function show($questionId)
    {
    }

    

}
