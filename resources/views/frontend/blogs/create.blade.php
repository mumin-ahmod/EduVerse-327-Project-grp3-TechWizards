@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <h1>Create a Blog Post</h1>

    <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea name="text" id="text" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="blog_image">Blog Image</label>
            <input type="file" name="blog_image" id="blog_image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="vdo_link">Video Link (optional)</label>
            <input type="text" name="vdo_link" id="vdo_link" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Blog Post</button>
    </form>
</div>
@endsection
