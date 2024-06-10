@extends('frontend.users.layouts.master')

@section('content')
<div class="container">
    <h2 class="text-center">All Categories</h2>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.category', ['category' => 'IT']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-laptop"></i> IT
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.category', ['category' => 'Business']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-briefcase"></i> Business
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.category', ['category' => 'Design']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-paint-brush"></i> Design
                    </h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-4">
        <a href="{{ route('courses.category', ['category' => 'Humanities']) }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-book"></i> Humanities
                    </h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
