@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>My Blogs <br><a href="{{ route('blogs.create') }}" class="btn btn-outline-primary mb-3">Post a Blog</a></h1>


        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


        @if (count($blogs) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Posted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ Str::limit($blog->text, 50) }}</td>
                            <td>{{ $blog->created_at }}</td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('blogs.destroy', $blog->blog_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No blogs available.</p>
        @endif
    </div>
@endsection
