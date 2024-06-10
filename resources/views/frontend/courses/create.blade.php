@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <h2>Create a New Course</h2>
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" required>
        </div>

        <div class="mb-3">
            <label for="course_image" class="form-label">Course Image</label>
            <input type="file" class="form-control" id="course_image" name="course_image" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="IT">IT</option>
                <option value="Business">Business</option>
                <option value="Design">Design</option>
                <option value="Humanities">Humanities</option>
            </select>
        </div>

        <input type="hidden" name="teacher_id" value="{{ auth()->id() }}">

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" required>
                <option value="Basic">Basic</option>
                <option value="Primary">Primary</option>
                <option value="High School">High School</option>
                <option value="College">College</option>
                <option value="Higher Education">Higher Education</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="trailer_link" class="form-label">Trailer Link</label>
            <input type="text" class="form-control" id="trailer_link" name="trailer_link">
        </div>

        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>
</div>

@endsection
