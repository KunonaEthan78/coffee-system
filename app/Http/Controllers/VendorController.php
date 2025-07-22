<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    public function showApplication()
    {
        return view('vendor.application');
    }

    public function submitApplication(Request $request)
    {
        $validated = $request->validate([
            'vendor_document' => 'required|file|mimes:pdf|max:5120' // 5MB max
        ]);

        // Store file locally first
        $path = $request->file('vendor_document')->store('vendor_documents');

        // Send to Java server
        $response = Http::attach(
            'document',
            Storage::get($path),
            basename($path)
        )->post(config('services.java_server.url') . '/api/vendor/validate', [
            'user_id' => auth()->id(),
            'role' => auth()->user()->getRoleNames()->first()
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Application submitted successfully!');
        }

        // Delete if failed
        Storage::delete($path);
        return back()->with('error', 'Validation failed: ' . $response->body());
    }
}
