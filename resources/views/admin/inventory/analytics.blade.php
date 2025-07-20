@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-success mb-4">📊 Inventory Analytics</h2>

    <h5 class="text-primary">Items by Location</h5>
    <table class="table table-bordered mb-5">
        <thead><tr><th>Location</th><th>Items</th></tr></thead>
        <tbody>
            @foreach($byLocation as $row)
                <tr>
                    <td>{{ $row->location }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h5 class="text-primary">Stock Status Summary</h5>
    <table class="table table-bordered">
        <thead><tr><th>Status</th><th>Total</th></tr></thead>
        <tbody>
            @foreach($stockLevels as $row)
                <tr>
                    <td>{{ ucfirst($row->status) }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
