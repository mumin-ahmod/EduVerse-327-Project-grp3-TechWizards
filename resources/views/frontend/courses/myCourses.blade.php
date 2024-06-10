@extends('frontend.layouts.master')

@section('content')

<div class="container">
    <h2>My Courses</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->category_id }}</td>
                <td>
                    <a href="{{ route('timeline_posts.byCourse', $course->course_id) }}" class="btn btn-info">Go To Timeline</a>

                    <a href="{{ route('courses.showEnrollment', $course->course_id) }}" class="btn btn-info">Enrollments</a>

                    <a href="{{ route('courses.edit', $course->course_id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('courses.destroy', $course->course_id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
