@extends('frontend.layouts.master')

@section('content')

<div class="container" style="margin:5%;">
    <div class="card p-4 shadow">
        <h2 class="text-center">{{ $course->course_name }}</h2>
        
        <div class="card mb-3 text-center" style="max-width: 400px; margin: 0 auto;">
            <img src="{{ asset('storage/' . $course->course_image) }}" alt="Course Image" style="max-width: 100%;" class="card-img-top">
        </div>

        <p>
            <i class="fas fa-folder"></i> Category: {{ $course->category_id }}
        </p>

        <p>
            <i class="fas fa-chalkboard-teacher"></i> Teacher: {{ $course->teacher->name }}
        </p>

        <p>
            <i class="fas fa-level-up-alt"></i> Level: {{ $course->level }}
        </p>

        @if ($course->trailer_link)
        <div class="embed-responsive embed-responsive-16by9">
            {!! $course->trailer_link !!}
        </div>
        @endif
    </div>

    <div class="text-center" style="margin-top: 20px;">
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf

            <input type="hidden" name="course_id" value="{{ $course->course_id }}">
            
            <button class="btn btn-info btn-lg" type="submit"
                onclick="return confirm('Do you want to Enroll to this course?')">
                Enroll Now
            </button>
        </form>
    </div>
</div>

@endsection
