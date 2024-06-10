@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h1>Course People</h1>

        <div class="row">

            @if (empty($enrolledUsers))
                <h3>No one entrolled at this course yet</h3>
            @else
                @foreach ($enrolledUsers as $user)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $user->user->name }}</h4>
                                <p class="card-text">Email: {{ $user->user->email }}</p>
                                <!-- Add more user information as needed -->
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
