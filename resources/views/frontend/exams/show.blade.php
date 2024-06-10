@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <h1>Exam: {{ $exam->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $exam->name }}</h5>
            <p class="card-text">Start Date: {{ date('d-M-Y h:i A', strtotime($exam->start_date)) }}</p>
            <p class="card-text">End Date: {{ date('d-M-Y h:i A', strtotime($exam->end_date)) }}</p>
            <p class="card-text">Course: {{ $course->course_name }}</p>
            <a href="{{route('question.create', $exam->id)}}" class="btn btn-outline-warning">Set Questions</a>
        </div>
    </div>
</div>

@endsection
