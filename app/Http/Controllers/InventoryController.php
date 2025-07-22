<?php

namespace App\Http\Controllers;

use App\Models\HarvestBatch;

class InventoryController extends Controller
{
    public function index()
    {
        $batches = HarvestBatch::with('coffeeGrade')->get();
        return view('admin.inventory-dashboard', compact('batches'));
    }
}
