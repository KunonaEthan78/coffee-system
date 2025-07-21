@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Batch</h3>

    <form action="{{ route('harvest-batches.update', $batch->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Quantity (kg) -->
    <div class="mb-3">
        <label for="quantity_kg" class="form-label">Quantity (kg)</label>
        <input type="number" step="0.01" class="form-control" id="quantity_kg" name="quantity_kg" 
               value="{{ old('quantity_kg', $batch->quantity_kg) }}" required>
    </div>

    <!-- Coffee Grade -->
    <div class="mb-3">
        <label for="coffee_grade_id" class="form-label">Coffee Grade</label>
        <select class="form-select" id="coffee_grade_id" name="coffee_grade_id" required>
            @foreach($grades as $grade)
                <option value="{{ $grade->id }}" 
                    {{ $batch->coffee_grade_id == $grade->id ? 'selected' : '' }}>
                    {{ $grade->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Harvest Date -->
    <div class="mb-3">
        <label for="harvest_date" class="form-label">Harvest Date</label>
        <input type="date" class="form-control" id="harvest_date" name="harvest_date" 
               value="{{ old('harvest_date', $batch->harvest_date ? $batch->harvest_date->format('Y-m-d') : '') }}">
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="In Stock" {{ old('status', $batch->status) == 'In Stock' ? 'selected' : '' }}>In Stock</option>
            <option value="Low Stock" {{ old('status', $batch->status) == 'Low Stock' ? 'selected' : '' }}>Low Stock</option>
            <option value="Out of Stock" {{ old('status', $batch->status) == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
        </select>
    </div>

    <!-- Notes -->
    <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $batch->notes) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

</div>
@endsection
