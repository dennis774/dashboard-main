<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudgetAllocation;

class BudgetAllocationController extends Controller
{
    // Display a listing of budget allocations
    public function index()
    {
        $budgetAllocations = BudgetAllocation::all();
        return view('roles.general.budget-allocation.index', compact('budgetAllocations'));
    }


    // Show the form for creating a new budget allocation
    public function create()
    {
        return view('roles.general.budget-allocation.create');
    }


    // Store a new budget allocation in the database
    public function store(Request $request)
    {
        $request->validate([
            'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        BudgetAllocation::create($request->all());


        return redirect()->route('targetSales.index')->with('success', 'Budget allocation created successfully!');
    }


    // Show the form for editing the specified budget allocation
    public function edit(BudgetAllocation $budgetAllocation)
    {
        return view('roles.general.budget-allocation.edit', compact('budgetAllocation'));
    }


    // Update the specified budget allocation in the database
    public function update(Request $request, BudgetAllocation $budgetAllocation)
    {
        $request->validate([
            'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        $budgetAllocation->update($request->all());


        return redirect()->route('targetSales.index')->with('success', 'Budget allocation updated successfully!');
    }


    // Delete the specified budget allocation
    public function destroy(BudgetAllocation $budgetAllocation)
    {
        $budgetAllocation->delete();


        return redirect()->route('targetSales.index')->with('success', 'Budget allocation deleted successfully!');
    }

}
