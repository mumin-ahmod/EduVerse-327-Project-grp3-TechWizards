@extends('frontend.layouts.master')

@section('content')
<div class="container" >
    <h2>Enrollment for Course: {{ $course->course_name }}</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Enrolled Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrolledUsers as $enrollment)
                <tr>
                    <td>{{ $enrollment->user->name }}</td>
                    <td>{{ $enrollment->created_at->format('M d, Y H:i A') }}</td>
                    <td>{{ $enrollment->status }}</td>
                    <td>
                        @if ($enrollment->status === 'pending')
                            <form action="{{ route('enrollments.accept', $enrollment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Accept Enrollment</button>
                            </form>
                        @endif

                        <form action="{{ route('enrollments.remove', $enrollment->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Remove Student</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
