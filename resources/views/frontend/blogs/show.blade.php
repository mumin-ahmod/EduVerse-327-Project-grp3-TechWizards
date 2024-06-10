@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>

    <div class="card">
        @if ($blog->blog_image)
            <img src="{{ asset('storage/' . $blog->blog_image) }}" class="card-img-top" alt="Blog Image">
        @endif
        <div class="card-body">
            <p class="card-text">
                {{ $blog->text }}
            </p>
            @if ($blog->vdo_link)
            <div class="embed-responsive embed-responsive-16by9">
                {!! $blog->vdo_link!!}
            </div>
            @endif
            <p class="card-text"><small class="text-muted">Posted on {{ $blog->created_at->format('F j, Y') }}</small></p>
        </div>
    </div>
</div>
@endsection
