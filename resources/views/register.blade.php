@extends('layout')

@section('title', 'Register')

@section('sign-in')
<!-- Placeholder for sign-in content -->
@endsection

@section('sign-up')
<form action="{{ route('register.post') }}" method="POST">
    @csrf
    <h1>Create Account</h1>
    <div class="social-icons">
        <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
        <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
    <span>or use your email for registration</span>
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Sign Up</button>
</form>
@endsection
