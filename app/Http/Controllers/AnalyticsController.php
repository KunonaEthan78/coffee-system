<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HarvestBatch;

class AnalyticsController extends Controller
{
    public function index()
    {
        $batches = HarvestBatch::with('coffeeGrade')->get();

        return view('analytics.index', compact('batches'));
    }
}
