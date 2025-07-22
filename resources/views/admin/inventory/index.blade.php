@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid bg-white shadow-sm py-3 mb-4 rounded">
    <div class="row align-items-center px-4 gy-3">
        <!-- 👤 Welcome Section -->
        <div class="col-md-6 d-flex align-items-center gap-3">
            <img src="{{ asset('images/default-avatar.png') }}" class="rounded-circle border shadow-sm" width="60" alt="Avatar">
            <div>
                <h5 class="mb-1 fw-bold text-success">Welcome, {{ auth()->user()->name }}</h5>
                <small class="text-muted">{{ auth()->user()->email }}</small>
            </div>
        </div>

        <!-- 📁 Navigation Actions -->
        <div class="col-md-6 d-flex justify-content-end gap-2 flex-wrap">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary fw-bold">🏠 Dashboard</a>
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary fw-bold">👤 Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger fw-bold">🔓 Log Out</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <!-- 📊 Dashboard Summary -->
    <div class="row text-center mb-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Batches</h6>
                    <h4 class="fw-bold text-primary">{{ $batchCount ?? 5 }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Quantity</h6>
                    <h4 class="fw-bold text-primary">{{ number_format($totalQuantity ?? 2050, 2) }} kg</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Grades Used</h6>
                    <span class="badge bg-info text-dark me-1">Grade A</span>
                    <span class="badge bg-info text-dark">Grade B</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔍 Search -->
    <form method="GET" class="mb-4 d-flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search grade, location, or status"
               class="form-control w-100 w-md-50">
        <button type="submit" class="btn btn-primary fw-bold">🔍 Search</button>
    </form>

    <!-- 📋 Inventory Table -->
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-header bg-primary text-white fw-bold">View All Batches</div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Grade</th>
                        <th>Quantity (kg)</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($batches as $batch)
                        <tr>
                            <td>{{ $batch->grade }}</td>
                            <td>{{ number_format($batch->quantity, 2) }}</td>
                            <td>kg</td>
                            <td><span class="badge bg-success">{{ ucfirst($batch->status ?? 'In Stock') }}</span></td>
                            <td>
                                <a href="{{ route('batches.edit', $batch->id) }}" class="text-primary me-2">✏️</a>
                                <form method="POST" action="{{ route('batches.destroy', $batch->id) }}" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">No batches found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- 📥 Report Download -->
    <div class="text-end">
        <a href="{{ route('inventory.export') }}" class="btn btn-success fw-bold">
            📥 Download Inventory Report
        </a>
    </div>
</div>
@endsection
