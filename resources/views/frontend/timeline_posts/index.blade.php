@extends('frontend.layouts.master')

@section('content')
    <div class="timeline-container" style="margin: 5%">
        <div class="text-center">
            <h1 class="green-text">{{ $course->course_name }}</h1>
        </div>

        <!-- Top Buttons (Centered) -->
        <div class="row timeline-center-buttons mb-3">
            <div class="col-md-4">
                <!-- Course Materials Button -->
                <button class="btn timeline-btn btn-block btn-outline-success">Course Materials</button>
            </div>
            <div class="col-md-4">
                <!-- All People Button -->
               <a href="{{route('enrollment.byCourse.people', $course->course_id)}}"> <button class="btn timeline-btn btn-block btn-outline-success">All People</button></a>
            </div>

            <div class="col-md-4">
                <!-- All People Button -->
                <a href="{{route('exam.byCourse', $course->course_id)}}"><button class="btn timeline-btn btn-block btn-outline-success">Exams Center</button></a>
            </div>
        </div>

        <!-- Course Timeline Section -->
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="timeline-title d-inline">Course Timeline</h2>
            </div>
            <div class="col-md-4">
                <!-- Plus Icon Button (With Space) -->
                <a href="{{ route('timeline_posts.create', $course->course_id ) }}">
                    <button class="btn timeline-btn float-right btn-outline-info">
                        <i class="fas fa-plus"></i> <!-- Plus Icon -->
                    </button>
                </a>
            </div>
        </div>

        <!-- List of Announcements -->
        @foreach ($timelinePosts as $post)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    
                    <p class="card-text">{{ $post->text }}</p>
                    <!-- Update and Delete Icons -->
                    <span class="badge badge-success btn">  <i class="fa fa-comment"></i></span>
                  
                </div>
            </div>
        @endforeach

        <h5 class="text-center text-alart">End of Timeline</h5>


    </div>
@endsection
