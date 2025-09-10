@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endpush

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">

            {{-- [PENAMBAHAN] Wrapper untuk Avatar dan Tombol Upload --}}
            <div class="avatar-upload-wrapper">
                <div class="profile-avatar">
                    {{-- Ganti dengan gambar profil user jika ada, jika tidak, tampilkan inisial --}}
                    {{-- Contoh: <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar"> --}}
                    <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                </div>
                {{-- Tombol upload kustom --}}
                <label for="avatar-upload" class="avatar-edit-button">
                    <i class='bx bxs-camera'></i>
                </label>
            </div>
            
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
        </div>

        <div class="profile-body">
            <h3 class="profile-section-title">Edit Informations</h3>
            
            {{-- Tambahkan 'enctype' untuk form yang mengandung input file --}}
            <form action="#" method="POST" class="profile-form" enctype="multipart/form-data">
                @csrf
                
                {{-- [PENAMBAHAN] Input file yang disembunyikan --}}
                <input type="file" id="avatar-upload" name="avatar" accept="image/png, image/jpeg, image/jpg, image/webp" style="display: none;">

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" required>
                </div>
                
                <hr class="form-divider">
                
                <h3 class="profile-section-title">Change Password</h3>
                 <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                 <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="auth-btn">Update Profile</button>
            </form>
        </div>
    </div>
</div>
@endsection

