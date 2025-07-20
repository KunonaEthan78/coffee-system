@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">📊 Analytics Summary</h2>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p><strong>Total Batches:</strong> {{ $batches->count() }}</p>
            <p><strong>Total Quantity (kg):</strong> {{ number_format($batches->sum('quantity_kg'), 2) }}</p>
            <p><strong>Grades Used:</strong>
                @foreach ($batches->pluck('coffeeGrade.name')->unique() as $grade)
                    {{ $grade }}&nbsp;
                @endforeach
            </p>
            <p><strong>Batches Low in Stock (&lt; 100 kg):</strong> {{ $batches->where('quantity_kg', '<', 100)->count() }}</p>
            <p><strong>Batches In Stock (&ge; 100 kg):</strong> {{ $batches->where('quantity_kg', '>=', 100)->count() }}</p>
        </div>
    </div>

    <a href="{{ url('/admin/inventory') }}" class="btn btn-secondary">← Back to Dashboard</a>

</div>
@endsection
