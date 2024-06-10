@extends('frontend.users.layouts.master')

@section('content')
<div class="container">
    <h1 class="text-center">All Blog Posts <br> <a href="{{ route('blogs.create') }}" class="btn btn-outline-primary mb-3">Post a Blog</a></h1>
   

    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-6 mb-4">
                <div class="card">
                    @if ($blog->blog_image)
                        <img src="{{ asset('storage/' . $blog->blog_image) }}" class="card-img-top" alt="Blog Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">
                            {{ strlen($blog->text) > 150 ? substr($blog->text, 0, 150) . '...' : $blog->text }}
                        </p>
                        <p class="card-text"><small class="text-muted">Posted on {{ $blog->created_at->format('F j, Y') }}</small></p>
                        <a href="{{ route('blogs.show', ['blog' => $blog->blog_id]) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No blog posts available.</p>
        @endforelse
    </div>
</div>
@endsection
