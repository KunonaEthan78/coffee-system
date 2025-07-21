@extends('layouts.guest')

@section('content')
<style>
    body {
        background: url('/images/bg.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .register-box {
        max-width: 500px;
        margin: 80px auto;
        padding: 40px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .register-box h2 {
        margin-bottom: 30px;
        font-weight: bold;
        text-align: center;
        color: #8B4513;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-golden {
        background-color: #d4af37;
        color: white;
        font-weight: bold;
        border-radius: 10px;
    }

    .btn-golden:hover {
        background-color: #b9982d;
    }
</style>

<div class="register-box">
    <h2>Register to Golden Bean</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" type="password" name="password" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-golden w-100">Create Account</button>
    </form>

    <p class="mt-3 text-center">
        Already have an account?
        <a href="{{ route('login') }}">Login here</a>
    </p>
</div>
@endsection
