<?php

namespace App\Http\Controllers\KuwagoTwo;

use App\Models\FakeDataTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class Kuwago_TwoController extends Controller
{
    // for dashboard
    public function general_kuwago_two(Request $request)
    {
        $interval = $request->input('interval','thisweek');
        $startDate = Carbon::now();
        $endDate = Carbon::now();


        switch ($interval) {
            case 'today':
                $startDate = Carbon::now()->startOfDay();
                $endDate = Carbon::now()->endOfDay();
                break;
            case 'yesterday':
                $startDate = Carbon::now()->subDays(1)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
            case 'last3days':
                $startDate = Carbon::now()->subDays(3)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
                break;
            case 'last5days':
                $startDate = Carbon::now()->subDays(5)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
                break;
            case 'lastweek':
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate = Carbon::now()->subWeek()->endOfWeek();
                break;
            case 'thisweek':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'thismonth':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'lastmonth':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'thisyear':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'lastyear':
                $startDate = Carbon::now()->subYear()->startOfYear();
                $endDate = Carbon::now()->subYear()->endOfYear();
                break;
            case 'overall':
                $startDate =  Carbon::parse(FakeDataTwo::min('date'));
                $endDate = Carbon::parse(FakeDataTwo::max('date'));
                break;
            case 'custom':
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                break;
            default:
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                break;
        }


        $chartdata = FakeDataTwo::whereBetween('date', [$startDate, $endDate])
        ->selectRaw('date, SUM(sales) as sales, SUM(expenses) as expenses,  SUM(orders) as orders')
        ->groupBy('date')
        ->get();


        // Ensure all dates in the range have a value
        $allDates = collect();
        $current = $startDate->copy();
        while ($current->lte($endDate)) {
            $allDates->push($current->copy());
            $current->addDay();
        }
            // Merge fetched data with all dates, filling gaps with 0 sales
            $chartdata = $allDates->map(function($date) use ($chartdata, $interval) {
                 $data = $chartdata->firstWhere('date', $date->toDateString());


                 $formattedDate = $date->toDateString();
                 if (in_array($interval, ['last3days', 'last5days', 'last7days', 'thisweek', 'lastweek'])) {
                     $formattedDate = $date->format('l'); // Day format
                 } elseif (in_array($interval, ['thisyear', 'lastyear'])) {
                     $formattedDate = $date->format('F'); // Month format
                 } // Date format for other cases remains as YYYY-MM-DD


                 return [
                    'date' => $formattedDate,
                    'orders' => $data ? $data->orders : 0,
                    'sales' => $data ? $data->sales : 0,
                    'expenses' => $data ? $data->expenses : 0, // Include expenses
                    'profit' => $data ? ($data->sales - $data->expenses) : 0
                ];
                });
        $actionRoute = route('general.kuwago-two.dashboard'); // Dynamically set this based on your logic  
        $totalOrders = $chartdata->sum('orders');    
        $totalSales = $chartdata->sum('sales');
        $totalProfit = $chartdata->sum('profit');
        $totalExpenses = $chartdata->sum('expenses');
        return view('general.kuwago-two.dashboard', compact('chartdata', 'totalSales', 'totalProfit', 'totalExpenses','totalOrders', 'actionRoute'));

    }
    // for expenses
    public function chart_expenses_kuwago_two(Request $request)
    {
        $interval = $request->input('interval','thisweek');
        $startDate = Carbon::now();
        $endDate = Carbon::now();


        switch ($interval) {
            case 'today':
                $startDate = Carbon::now()->startOfDay();
                $endDate = Carbon::now()->endOfDay();
                break;
            case 'yesterday':
                $startDate = Carbon::now()->subDays(1)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
            case 'last3days':
                $startDate = Carbon::now()->subDays(3)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
                break;
            case 'last5days':
                $startDate = Carbon::now()->subDays(5)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
                break;
            case 'lastweek':
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate = Carbon::now()->subWeek()->endOfWeek();
                break;
            case 'thisweek':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'thismonth':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'lastmonth':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'thisyear':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'lastyear':
                $startDate = Carbon::now()->subYear()->startOfYear();
                $endDate = Carbon::now()->subYear()->endOfYear();
                break;
            case 'overall':
                $startDate =  Carbon::parse(FakeDataTwo::min('date'));
                $endDate = Carbon::parse(FakeDataTwo::max('date'));
                break;
            case 'custom':
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                break;
            default:
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                break;
        }


        $chartdata = FakeDataTwo::whereBetween('date', [$startDate, $endDate])
        ->selectRaw('date, SUM(expenses) as expenses')
        ->groupBy('date')
        ->get();


        // Ensure all dates in the range have a value
        $allDates = collect();
        $current = $startDate->copy();
        while ($current->lte($endDate)) {
            $allDates->push($current->copy());
            $current->addDay();
        }
            // Merge fetched data with all dates, filling gaps with 0 sales
            $chartdata = $allDates->map(function($date) use ($chartdata, $interval) {
                 $data = $chartdata->firstWhere('date', $date->toDateString());


                 $formattedDate = $date->toDateString();
                 if (in_array($interval, ['last3days', 'last5days', 'last7days', 'thisweek', 'lastweek'])) {
                     $formattedDate = $date->format('l'); // Day format
                 } elseif (in_array($interval, ['thisyear', 'lastyear'])) {
                     $formattedDate = $date->format('F'); // Month format
                 } // Date format for other cases remains as YYYY-MM-DD


                 return [
                    'date' => $formattedDate,
                    'expenses' => $data ? $data->expenses : 0,
                ];
                });
                
        $actionRoute = route('general.kuwago-two.expenses'); // Dynamically set this based on your logic      
        $totalExpenses = $chartdata->sum('expenses');
        return view('general.kuwago-two.expenses', compact('chartdata', 'totalExpenses', 'actionRoute'));

    }
    // for sales
    public function chart_sales_kuwago_two(Request $request)
    {
        $interval = $request->input('interval','thisweek');
        $startDate = Carbon::now();
        $endDate = Carbon::now();


        switch ($interval) {
            case 'today':
                $startDate = Carbon::now()->startOfDay();
                $endDate = Carbon::now()->endOfDay();
                break;
            case 'yesterday':
                $startDate = Carbon::now()->subDays(1)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
            case 'last3days':
                $startDate = Carbon::now()->subDays(3)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
                break;
            case 'last5days':
                $startDate = Carbon::now()->subDays(5)->startOfDay();
                $endDate = Carbon::now()->subDays(1)->endOfDay();
                break;
            case 'lastweek':
                $startDate = Carbon::now()->subWeek()->startOfWeek();
                $endDate = Carbon::now()->subWeek()->endOfWeek();
                break;
            case 'thisweek':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'thismonth':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'lastmonth':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'thisyear':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'lastyear':
                $startDate = Carbon::now()->subYear()->startOfYear();
                $endDate = Carbon::now()->subYear()->endOfYear();
                break;
            case 'overall':
                $startDate =  Carbon::parse(FakeDataTwo::min('date'));
                $endDate = Carbon::parse(FakeDataTwo::max('date'));
                break;
            case 'custom':
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                break;
            default:
                $startDate = Carbon::parse($request->input('start_date'));
                $endDate = Carbon::parse($request->input('end_date'));
                break;
        }


        $chartdata = FakeDataTwo::whereBetween('date', [$startDate, $endDate])
        ->selectRaw('date, SUM(sales) as sales, SUM(cash) as cash, SUM(gcash) as gcash')
        ->groupBy('date')
        ->get();


        // Ensure all dates in the range have a value
        $allDates = collect();
        $current = $startDate->copy();
        while ($current->lte($endDate)) {
            $allDates->push($current->copy());
            $current->addDay();
        }
            // Merge fetched data with all dates, filling gaps with 0 sales
            $chartdata = $allDates->map(function($date) use ($chartdata, $interval) {
                 $data = $chartdata->firstWhere('date', $date->toDateString());


                 $formattedDate = $date->toDateString();
                 if (in_array($interval, ['last3days', 'last5days', 'last7days', 'thisweek', 'lastweek'])) {
                     $formattedDate = $date->format('l'); // Day format
                 } elseif (in_array($interval, ['thisyear', 'lastyear'])) {
                     $formattedDate = $date->format('F'); // Month format
                 } // Date format for other cases remains as YYYY-MM-DD


                 return [
                    'date' => $formattedDate,
                    'sales' => $data ? $data->sales : 0,
                    'cash' => $data ? $data->cash : 0,
                    'gcash' => $data ? $data->gcash : 0,
                ];
                });
                
        $actionRoute = route('general.kuwago-two.sales'); // Dynamically set this based on your logic      
        $totalSales = $chartdata->sum('sales');
        $totalGcash = $chartdata->sum('gcash');
        $totalCash = $chartdata->sum('cash');
        return view('general.kuwago-two.sales', compact('chartdata', 'totalSales', 'totalGcash', 'totalCash', 'actionRoute'));

    }
}
