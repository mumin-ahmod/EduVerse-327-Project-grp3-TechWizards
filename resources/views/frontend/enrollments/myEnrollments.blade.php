@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h2>My Enrollments</h2>

    <h3 class="mt-5">Enrolled Courses</h3>
    @if ($acceptedEnrollments->count() > 0)
        <div class="card-list">
            @foreach ($acceptedEnrollments as $enrollment)
            <a href="{{ route('timeline_posts.byCourse', $enrollment->course->course_id) }}" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $enrollment->course->course_name }}</h4>
                        <p class="card-text">Enrolled on: {{ $enrollment->created_at->format('M d, Y') }}</p>
                        <!-- Additional information about the course or action buttons -->

                        <button class="btn btn-warning">Go to Course</button>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    @else
        <p>You have no accepted enrollments.</p>
    @endif

    <h3 class="mt-5">Pending Enrollments</h3>
    @if ($pendingEnrollments->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Enroll Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingEnrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->course->course_name }}</td>
                        <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                        <td>
                            <form action="{{ route('enrollments.cancel', $enrollment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Cancel Enrollment')">Cancel Enrollment</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have no pending enrollments.</p>
    @endif
</div>
@endsection
