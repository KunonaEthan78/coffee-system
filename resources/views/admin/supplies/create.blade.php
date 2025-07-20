@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Add New Supply</h2>

    <form method="POST" action="{{ route('supplies.store') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Supplier</label>
            <select name="supplier_id" required class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="">-- Select Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Coffee</label>
            <select name="coffee_id" required class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="">-- Select Coffee --</option>
                @foreach($coffees as $coffee)
                    <option value="{{ $coffee->id }}">{{ $coffee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Quantity (kg)</label>
            <input type="number" name="quantity" step="0.01" required class="w-full border-gray-300 rounded-lg shadow-sm" />
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Supplied Date</label>
            <input type="date" name="supplied_at" required class="w-full border-gray-300 rounded-lg shadow-sm" />
        </div>

        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg">Save Supply</button>
    </form>
</div>
@endsection