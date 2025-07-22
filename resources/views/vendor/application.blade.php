@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Vendor Application Portal</h5>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h4 class="mb-4">Welcome, {{ auth()->user()->name }}!</h4>
                    
                    <div class="mb-4 p-3 border rounded bg-light">
                        <p class="fw-bold mb-2">Required Documents:</p>
                        <ol class="mb-0">
                            <li>Financial score report (last 3 years)</li>
                            <li>Regulatory compliance certificates</li>
                            <li>Business reputation references</li>
                        </ol>
                    </div>

                    <form method="POST" action="{{ route('vendor.submit') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="vendor_document" class="form-label">
                                Upload Combined PDF Document
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="file" id="vendor_document" 
                                   name="vendor_document" accept=".pdf" required>
                            <div class="form-text">Max 5MB PDF file only</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-upload me-2"></i> Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection