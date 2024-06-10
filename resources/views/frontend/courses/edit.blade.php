@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <h2>Edit Course</h2>

    <form action="{{ route('courses.update', $course->course_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
        </div>

        <div class="mb-3">
            <label for="course_image" class="form-label">Course Image</label>
            <input type="file" class="form-control" id="course_image" name="course_image">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="it" {{ $course->category_id === 'it' ? 'selected' : '' }}>IT</option>
                <option value="business" {{ $course->category_id === 'business' ? 'selected' : '' }}>Business</option>
                <option value="design" {{ $course->category_id === 'design' ? 'selected' : '' }}>Design</option>
                <option value="humanities" {{ $course->category_id === 'humanities' ? 'selected' : '' }}>Humanities</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $course->start_date }}" required>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" required>
                <option value="basic" {{ $course->level === 'basic' ? 'selected' : '' }}>Basic</option>
                <option value="primary" {{ $course->level === 'primary' ? 'selected' : '' }}>Primary</option>
                <option value="high_school" {{ $course->level === 'high_school' ? 'selected' : '' }}>High School</option>
                <option value="college" {{ $course->level === 'college' ? 'selected' : '' }}>College</option>
                <option value="higher_education" {{ $course->level === 'higher_education' ? 'selected' : '' }}>Higher Education</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="trailer_link" class="form-label">Trailer Link</label>
            <input type="text" class="form-control" id="trailer_link" name="trailer_link" value="{{ $course->trailer_link }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
</div>

@endsection
