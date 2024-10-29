<?php

namespace App\Http\Controllers;

use App\Models\ChartData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ChartDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Define your date range
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        // Fetch within the specified date range
        $chartdata = ChartData::whereBetween('date', [$startDate, $endDate])->get();

        // $chartdata=ChartData::all();
        // return view('dashboard.show', compact('chartdata'));
        return view('admin.dashboard', compact('chartdata'));
    }
}
