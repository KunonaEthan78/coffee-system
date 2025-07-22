@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white shadow-sm py-3 mb-4 rounded">
    <div class="row align-items-center px-4 gy-3">
        <!-- 👤 Welcome Header -->
        <div class="col-md-6 d-flex align-items-center gap-3">
            <img src="{{ asset('images/default-avatar.png') }}" alt="Avatar" class="rounded-circle border shadow-sm" width="60">
            <div>
                <h5 class="mb-1 fw-bold text-success">Welcome, {{ auth()->user()->name }}</h5>
                <small class="text-muted">{{ auth()->user()->email }}</small>
            </div>
        </div>

        <!-- 📁 Dashboard Buttons -->
        <div class="col-md-6 d-flex justify-content-end gap-2 flex-wrap">
           
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary fw-bold">👤 Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger fw-bold">🔓 Log Out</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <!-- 📊 Summary Cards -->
    <div class="row mb-4 text-center">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Batches</h6>
                    <h4 class="fw-bold text-primary">{{ $batches->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Quantity</h6>
                    <h4 class="fw-bold text-primary">
                        {{ number_format($batches->sum('quantity_kg'), 2) }} kg
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Grades Used</h6>
                    @foreach ($batches->pluck('coffeeGrade.name')->unique() as $grade)
                        <span class="badge bg-info text-dark me-1">{{ $grade }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    

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
                         <th>Date</th>  <!-- New Date column -->
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($batches as $batch)
                    <tr>
                        <td>{{ $batch->coffeeGrade->name ?? '-' }}</td>
                        <td>{{ number_format($batch->quantity_kg, 2) }}</td>
                        <td>kg</td>
                        <td>{{ \Carbon\Carbon::parse($batch->harvest_date)->format('Y-m-d') }}</td>

                        <td>
                            <span class="badge {{ $batch->quantity_kg < 100 ? 'bg-danger' : 'bg-success' }}">
                                {{ $batch->quantity_kg < 100 ? 'Low Stock' : 'In Stock' }}
                            </span>
                            <a href="{{ route('inventory.index') }}">Back to Inventory</a>

                        </td>
                        <td>
    <!-- ✏️ Edit -->
    <a href="{{ route('harvest-batches.edit', $batch->id) }}" class="btn btn-sm btn-outline-primary me-1">
        ✏️ Edit
    </a>

    <!-- 🗑️ Delete -->
    <form method="POST" action="{{ route('harvest-batches.destroy', $batch->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this batch?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger">
            🗑️ Delete
        </button>
    </form>
</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No batches found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


<a href="{{ route('analytics.index') }}" class="btn btn-primary mb-3">📊 View Analytics</a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
<form action="{{ route('harvest-batches.update', $harvestBatch->id) }}" method="POST">
    @csrf
    @method('PUT')
    ...
</form>

@endsection
