@extends('frontend.users.layouts.master')

@section('content')
    <div class="container">
        <h2 class="text-center">All Courses</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('courses.show', $course) }}" style="text-decoration:none">
                        <div class="card">
                            @if ($course->course_image)
                                <img src="{{ asset('storage/' . $course->course_image) }}" class="card-img-top"
                                    alt="Course Image">
                            @else
                                <!-- You can add a default image or placeholder here -->
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <p class="card-text">
                                    Category: {{ $course->category_id }}
                                </p>
                                <p class="card-text">
                                    Level: {{ $course->level }}
                                </p>
                                <p class="card-text">
                                    <i class="fas fa-chalkboard-teacher"></i> Teacher: {{ $course->teacher->name }}
                                </p>
                                <p class="card-text">
                                    <i class="far fa-calendar-alt"></i> Start Date: {{ $course->start_date }}
                                </p>
                                <form action="{{ route('enrollments.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="course_id" value="{{ $course->course_id }}">
                                    
                                    <button class="btn btn-info" type="submit"
                                        onclick="return confirm('Do you want to Enroll to this course?')">
                                        Enroll Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
