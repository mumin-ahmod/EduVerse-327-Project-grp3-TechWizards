@extends('frontend.layouts.master')

@section('content')

    <div class="container">
        <h2 class="text-center">Exams Center</h2>

        @if ($course->teacher_id == $user->id)
            <h3>Welcome Teacher
                <a href="{{ route('exam.create', $course->course_id) }}" class="btn btn-outline-success">Create Exam</a>
            </h3>
        @endif

    </div>


    <h1>Exams of Course: {{ $course->course_name }}</h1>


    @if ($exams->isEmpty())
        <h6>No Exams Available in this course</h6>
    @else
        <div class="row">
            @foreach ($exams as $exam)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('exam.show', $exam->id) }}" style="text-decoration: none;">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $exam->name }}</h5>
                                <p class="card-text">
                                    Start: {{ date('d-M-Y h:i A', strtotime($exam->start_date)) }}<br>
                                    End: {{ date('d-M-Y h:i A', strtotime($exam->end_date)) }}
                                </p>

                                @if ($course->teacher_id == $user->id)
                                    <a href="{{ route('question.create', $exam->id) }}" class="btn btn-dark">Set
                                        Question</a>
                                @else
                                    <a href="{{ route('question.index', $exam->id) }}" class="btn btn-dark">See
                                        Questions</a>
                                @endif

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

@endsection
