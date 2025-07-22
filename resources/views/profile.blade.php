@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- 💎 Header Greeting -->
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color:#0A6847;">Welcome back, {{ auth()->user()->name ?? 'Moureen' }} 👋</h1>
        <span class="badge bg-info text-dark">{{ ucfirst(auth()->user()->role ?? 'Admin') }}</span>
        <p class="text-muted mt-2">Logged in as: {{ auth()->user()->email ?? 'nassangamoureen100@gmail.com' }}</p>
    </div>

    <!-- 🎀 Profile Card with Split Columns -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded">
                <div class="card-header text-white text-center fw-bold fs-4" style="background: linear-gradient(to right, #4F46E5, #6B5AED);">
                    👤 Profile Overview
                </div>
                <div class="card-body" style="background-color: #fefefe;">

                    <div class="row">
                        <!-- 🌸 Left: Avatar + Info -->
                        <div class="col-md-4 d-flex flex-column align-items-center border-end" style="background-color:#F3F4F6;">
                            <img src="{{ asset('images/default-avatar.png') }}"
                                 alt="Avatar" class="rounded-circle border shadow-sm mb-3" width="110">
                            <h4 class="fw-bold">{{ auth()->user()->name ?? 'Moureen' }}</h4>
                            <p class="text-muted mb-1">{{ auth()->user()->email ?? 'nassangamoureen100@gmail.com' }}</p>
                            <p class="text-secondary small mb-0">Role: {{ ucfirst(auth()->user()->role ?? 'Admin') }}</p>
                            <p class="text-secondary small">Joined on {{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>

                        <!-- 🎯 Right: Editable Form -->
                        <div class="col-md-8 px-4 py-3">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PATCH')

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name</label>
                                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                                           class="form-control border rounded shadow-sm" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                                           class="form-control border rounded shadow-sm" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">New Password</label>
                                    <input type="password" name="password"
                                           class="form-control border rounded shadow-sm" placeholder="••••••••">
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn fw-bold text-white shadow"
                                            style="background-color: #198754;">
                                        💾 Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- /row -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
