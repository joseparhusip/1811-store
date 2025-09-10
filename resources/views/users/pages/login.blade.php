@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="auth-container">
    <div class="auth-form">
        {{-- [PERUBAHAN] Mengganti teks dengan logo gambar --}}
        <div class="auth-logo">
            <img src="{{ asset('assets/img/logo-1811-store.png') }}" alt="1811 Studio Logo">
        </div>

        <form method="POST" action="{{ route('login.submit') }}" style="width: 100%;">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                @error('email') <span class="error" style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input id="password" type="password" name="password" placeholder="Enter your password" required>
                    <i class='bx bx-hide toggle-password'></i>
                </div>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="auth-options">
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="auth-btn">
                LOGIN
            </button>
        </form>

        <p class="auth-switch">
            Don't have an account? <a href="{{ route('signup.form') }}">Sign Up</a>
        </p>
    </div>
</div>
@endsection