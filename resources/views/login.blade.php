@extends('layout')

@section('title', 'Login')

@section('content')
<div class="form-container sign-in">
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <h1>Sign In</h1>
        <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            
            
        </div>
        <span>or use your email password</span>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <a href="#">Forget Your Password?</a>
        <button type="submit">Sign In</button>
    </form>
</div>
<div class="form-container sign-up">
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <h1>Create Account</h1>
        <div class="social-icons">
            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Sign Up</button>
    </form>
</div>
@endsection
