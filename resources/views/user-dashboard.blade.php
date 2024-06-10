@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <h1 class="text-center">Welcome to Dashboard</h1>

    @if ($user)
      
        <h3>User Name: {{ $user->name }}</h3>
        <p>Joined Date: {{ $user->created_at->format('F d, Y') }}</p>
    @endif
</div>
@endsection
