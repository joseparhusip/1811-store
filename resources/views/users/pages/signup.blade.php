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

        <form method="POST" action="{{ route('signup.submit') }}" style="width: 100%;">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Enter your username" required autofocus>
                @error('username') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group">
                <label for="nomor_handphone">Nomor handphone</label>
                <input id="nomor_handphone" type="text" name="nomor_handphone" value="{{ old('nomor_handphone') }}" placeholder="Enter your Phone number" required>
                @error('nomor_handphone') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="auth-btn">
                SIGNUP
            </button>
        </form>

        <p class="auth-switch">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
        </p>
    </div>
</div>
@endsection