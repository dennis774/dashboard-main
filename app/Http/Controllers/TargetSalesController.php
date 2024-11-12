<?php

namespace App\Http\Controllers;

use App\Models\TargetSales;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BudgetAllocation;

class TargetSalesController extends Controller
{
    // Show the list of target sales
    public function index()
    {
        // Get all target sales and convert dates to Carbon instances
        $targetSales = TargetSales::all()->map(function($targetSale) {
            $targetSale->start_date = Carbon::parse($targetSale->start_date);
            $targetSale->end_date = Carbon::parse($targetSale->end_date);
            return $targetSale;
        });
   
        // Get all budget allocations and convert dates to Carbon instances
        $budgetAllocations = BudgetAllocation::all()->map(function($budgetAllocation) {
            $budgetAllocation->start_date = Carbon::parse($budgetAllocation->start_date);
            $budgetAllocation->end_date = Carbon::parse($budgetAllocation->end_date);
            return $budgetAllocation;
        });
   
        // Pass both targetSales and budgetAllocations to the view
        return view('roles.general.financial-target.index', compact('targetSales', 'budgetAllocations'));
    }


    // Show the form for creating a new target sale
    public function create()
    {
        return view('roles.general.financial-target.create');
    }


    // Store a newly created target sale in the database
    public function store(Request $request)
    {
        $request->validate([
            'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Ensure that the start_date and end_date are parsed correctly before creating
        $targetSale = new TargetSales($request->all());
        $targetSale->start_date = Carbon::parse($request->start_date);
        $targetSale->end_date = Carbon::parse($request->end_date);
        $targetSale->save();


        return redirect()->route('targetSales.index')->with('success', 'Target sale created successfully!');
    }


    // Show the form for editing the specified target sale
    public function edit(TargetSales $targetSale)
    {
        // Convert dates to Carbon instances before showing the edit form
        $targetSale->start_date = Carbon::parse($targetSale->start_date);
        $targetSale->end_date = Carbon::parse($targetSale->end_date);


        return view('roles.general.financial-target.edit', compact('targetSale'));
    }


    // Update the specified target sale in the database
    public function update(Request $request, TargetSales $targetSale)
    {
        $request->validate([
            'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Update the target sale, ensuring dates are Carbon instances
        $targetSale->update([
            'business_type' => $request->business_type,
            'amount' => $request->amount,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
        ]);


        return redirect()->route('targetSales.index')->with('success', 'Target sale updated successfully!');
    }


    // Remove the specified target sale from the database
    public function destroy(TargetSales $targetSale)
    {
        $targetSale->delete();


        return redirect()->route('targetSales.index')->with('success', 'Target sale deleted successfully!');
    }

}
