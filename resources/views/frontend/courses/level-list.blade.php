@extends('frontend.users.layouts.master')

@section('content')
<div class="container">
    <h2 class="text-center">Levels</h2>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.level', ['level' => 'Basic']) }}" class="card-link">
            <div class="card">
                <div class card-body>
                    <h5 class="card-title">
                        <i class="fas fa-graduation-cap"></i> Basic
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.level', ['level' => 'Primary']) }}" class=" card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-graduation-cap"></i> Primary
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.level', ['level' => 'High School']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-graduation-cap"></i> High School
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.level', ['level' => 'College']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-graduation-cap"></i> College
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.level', ['level' => 'Higher Education']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-graduation-cap"></i> Higher Education
                    </h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
