@extends('blog.master')
@section('title') About @stop
@section('content')
    <div class="py-5 my-5 text-center text-lg-start">
        <p class="fw-bold text-primary">Dear Viewer</p>
        <h1 class="fw-bold">
            Welcome to It News Blog
        </h1>
        <p>Doesn't have an account ? <span class="fw-bold text-primary">Login or Register here!</span></p>
        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary rounded-pill px-3">Register</a>
    </div>
@endsection
