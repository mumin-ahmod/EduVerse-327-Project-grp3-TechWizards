@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>{{ $course->course_name }} - My Timeline Posts
            <a href="{{ route('timeline_posts.create', $course->course_id) }}">
                <button class="btn timeline-btn float-right btn-outline-info">
                    <i class="fas fa-plus"></i> <!-- Plus Icon -->
                </button>
            </a>
        </h1>

       

        @foreach ($timelinePosts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->text }}</p>
                    @if ($post->file)
                        <p>Contains file: <i class="fas fa-file"></i></p>
                    @endif
                    <p class="card-text">Posted on: {{ $post->created_at->format('M d, Y H:i A') }}</p>
                    <div class="d-flex justify-content-between">
                        <!-- Add a Delete button to delete the post -->
                        <form action="{{ route('timeline_posts.destroy', $post->id) }}" method="POST">
                            @csrf

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
