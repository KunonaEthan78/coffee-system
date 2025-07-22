<?php

namespace App\Http\Controllers;

use App\Models\HarvestBatch;
use App\Models\CoffeeGrade;
use App\Models\Farm;

class DashboardController extends Controller
{
    public function show()
    {
        return view('dashboards.cooperative', [
            'harvestBatches' => HarvestBatch::all(),
            'grades' => CoffeeGrade::all(),
            'farms' => Farm::all(),
        ]);
    }
    

public function dashboard()
{
    $harvestBatches = HarvestBatch::with('coffeeGrade')->get();

    return view('dashboard', compact('harvestBatches'));
}

}
