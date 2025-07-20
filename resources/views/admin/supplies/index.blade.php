@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">All Supplies</h2>
        <a href="{{ route('supplies.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">Add New Supply</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Supplier</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Coffee</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Quantity</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Supplied Date</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplies as $supply)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $supply->supplier->name }}</td>
                    <td class="px-4 py-2">{{ $supply->coffee->name }}</td>
                    <td class="px-4 py-2">{{ $supply->quantity }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($supply->supplied_at)->toFormattedDateString() }}</td>
                    <td class="px-4 py-2 text-sm text-blue-600">
                        <!-- You can add edit/delete buttons here -->
                        <span class="text-gray-400 italic">Coming soon</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection