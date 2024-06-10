@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <h1>Create Exam</h1>

    <form method="POST" action="{{ route('exam.store', $course->course_id) }}">
        @csrf

        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="name" id="course_name" class="form-control" value="{{ $course->course_name }}" readonly>
        </div>

        <div class="form-group">
            <label for="name">Exam Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
        </div>

        <input type="hidden" name="course_id" value="{{ $course->course_id }}">

        <button type="submit" class="btn btn-primary">Create Exam</button>
    </form>
</div>



@endsection


