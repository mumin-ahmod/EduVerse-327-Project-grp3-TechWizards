@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>Post In Timeline <a href="{{ route('timeline_posts.byCourse.my', $course->course_id) }}"
                class="btn btn-outline-success">My All Posts</a></h1>


        <form action="{{ route('timeline_posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf





            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="text">Text</label>
                <textarea name="text" id="text" class="form-control" rows="4" required>{{ old('text') }}</textarea>
            </div>

            <div class="form-group">
                <label for="file">Attachment (optional)</label>
                <input type="file" name="file" id="file" class="form-control-file">
            </div>

            <input type="hidden" name="course_id" value="{{ $course->course_id }}">

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
