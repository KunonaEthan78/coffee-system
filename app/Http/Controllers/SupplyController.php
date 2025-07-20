<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Models\Supplier;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']); // apply auth/admin middleware
    }

    public function index()
    {
        $supplies = Supply::with(['supplier', 'coffee'])->get();

        // Chart data: total quantity by supplier
        $chartData = Supply::select('supplier_id', DB::raw('SUM(quantity) as total'))
            ->groupBy('supplier_id')
            ->with('supplier')
            ->get()
            ->map(function ($item) {
                return [
                    'supplier' => $item->supplier->name,
                    'total' => $item->total,
                ];
            });

        return view('supplies.index', compact('supplies', 'chartData'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $coffees = Coffee::all();
        return view('supplies.create', compact('suppliers', 'coffees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'coffee_id' => 'required|exists:coffees,id',
            'quantity' => 'required|numeric',
            'supplied_at' => 'required|date',
        ]);

        Supply::create($request->all());

        return redirect()->route('supplies.index')->with('success', 'Supply added successfully.');
    }
}