<?php

namespace App\Http\Controllers\Uddesign;

use App\Models\FakeDataThree;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\FakeDataMerch;

class UddesignController extends Controller
{
    // for /uddesign
    public function general_uddesign(Request $request)
    {
        // Retrieve the interval from the request, default to 'thisweek'
        $interval = $request->input('interval', 'thisweek');
        
        // Get the date range based on the interval
        $dates = $this->getDateRange($interval, $request);

        // Query and aggregate data
        $chartdata = FakeDataThree::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(
                '
                ' .
                    ($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) .
                    ' as period,
                SUM(total_sales) as total_sales, SUM(print_sales) as print_sales, SUM(merch_sales) as merch_sales, SUM(custom_sales) as custom_sales,
                SUM(total_expenses) as total_expenses, SUM(print_expenses) as print_expenses, SUM(merch_expenses) as merch_expenses, SUM(custom_expenses) as custom_expenses
            '
            )
            ->groupBy('period')
            ->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                $item->total_profit = $item->total_sales - $item->total_expenses;
                $item->print_profit = $item->print_sales - $item->print_expenses;
                $item->merch_profit = $item->merch_sales - $item->merch_expenses;
                $item->custom_profit = $item->custom_sales - $item->custom_expenses;
                return $item;
            });

        // Calculate totals
        $totalPrintSales = $chartdata->sum('print_sales');
        $totalPrintProfit = $chartdata->sum('print_profit');
        $totalPrintExpenses = $chartdata->sum('print_expenses');

        $totalMerchSales = $chartdata->sum('merch_sales');
        $totalMerchProfit = $chartdata->sum('merch_profit');
        $totalMerchExpenses = $chartdata->sum('merch_expenses');

        $totalCustomSales = $chartdata->sum('custom_sales');
        $totalCustomProfit = $chartdata->sum('custom_profit');
        $totalCustomExpenses = $chartdata->sum('custom_expenses');

        $totalSales = $chartdata->sum('total_sales');
        $totalProfit = $chartdata->sum('total_profit');
        $totalExpenses = $chartdata->sum('total_expenses');

        // Prepare data for the view
        $actionRoute = route('general.uddesign.dashboard');
        $totals = compact('totalSales', 'totalProfit', 'totalExpenses');
        $print = compact('totalPrintSales', 'totalPrintProfit', 'totalPrintExpenses');
        $merch = compact('totalMerchSales', 'totalMerchProfit', 'totalMerchExpenses');
        $custom = compact('totalCustomSales', 'totalCustomProfit', 'totalCustomExpenses');

        // Return the view with the data
        return view('general.uddesign.dashboard', array_merge(
            compact('actionRoute', 'chartdata'), 
            $totals,
            $print, 
            $merch, 
            $custom
        ));
    }
    
    // for /uddesign/sales
    public function chart_sales_uddesign(Request $request)
    {
        // Retrieve the interval from the request, default to 'thisweek'
        $interval = $request->input('interval', 'thisweek');
        
        // Get the date range based on the interval
        $dates = $this->getDateRange($interval, $request);

        // Query and aggregate data
        $chartdata = FakeDataThree::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(
                '
                    ' .
                    ($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) .
                    ' as period,
                    SUM(total_sales) as total_sales, SUM(print_sales) as print_sales, SUM(merch_sales) as merch_sales, SUM(custom_sales) as custom_sales,
                    SUM(gcash) as gcash, SUM(cash) as cash
                '
            )
            ->groupBy('period')
            ->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                $item->total_sales = $item->total_sales;
                $item->print_sales = $item->print_sales;
                $item->merch_sales = $item->merch_sales;
                $item->custom_sales = $item->custom_sales;
                $item->gcash = $item->gcash;
                $item->cash = $item->cash;
                return $item;
            });

        // Prepare the action route for the view
        $actionRoute = route('general.uddesign.sales');
        
        // Calculate totals
        $totalSales = $chartdata->sum('total_sales');
        $totalPrintSales = $chartdata->sum('print_sales');
        $totalMerchSales = $chartdata->sum('merch_sales');
        $totalCustomSales = $chartdata->sum('custom_sales');
        $totalGcash = $chartdata->sum('gcash');
        $totalCash = $chartdata->sum('cash');
        
        // Return the view with the data
        return view('general.uddesign.sales', compact('chartdata', 'totalSales', 'totalPrintSales', 'totalMerchSales', 'totalCustomSales', 'totalGcash', 'totalCash', 'actionRoute'));
    }


    // for /uddesign/expenses
    public function chart_expenses_uddesign(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeDataThree::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(
                '
                    ' .
                    ($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) .
                    ' as period,
                    SUM(total_expenses) as total_expenses, SUM(print_expenses) as print_expenses, SUM(merch_expenses) as merch_expenses, SUM(custom_expenses) as custom_expenses
                '
            )
            ->groupBy('period')
            ->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                $item->total_expenses = $item->total_expenses;
                $item->print_expenses = $item->print_expenses;
                $item->merch_expenses = $item->merch_expenses;
                $item->custom_expenses = $item->custom_expenses;
                return $item;
            });

        $actionRoute = route('general.uddesign.expenses');
        $totalExpenses = $chartdata->sum('total_expenses');
        $totalPrintExpenses = $chartdata->sum('print_expenses');
        $totalMerchExpenses = $chartdata->sum('merch_expenses');
        $totalCustomExpenses = $chartdata->sum('custom_expenses');

        return view('general.uddesign.expenses', compact('actionRoute', 'chartdata', 'totalExpenses', 'totalPrintExpenses', 'totalMerchExpenses', 'totalCustomExpenses'));
    }

    // This method changes the format of the date for display purposes, ensuring the date is presented correctly based on the interval.
    private function formatDate($interval, $period)
    {
        if ($interval === 'overall') {
            return $period;
        }

        if ($interval === 'thisyear' || $interval === 'lastyear') {
            return Carbon::parse($period)->format('F');
        }

        if (in_array($interval, ['today', 'yesterday', 'last3days', 'last5days', 'last7days', 'thisweek', 'lastweek'])) {
            return Carbon::parse($period)->format('l');
        }

        return Carbon::parse($period)->toDateString();
    }

    //This method filters the data by providing the start and end dates based on the selected interval.
    private function getDateRange($interval, $request)
    {
        switch ($interval) {
            case 'today':
                return ['start' => Carbon::now()->startOfDay(), 'end' => Carbon::now()->endOfDay()];
            case 'yesterday':
                return [
                    'start' => Carbon::now()
                        ->subDays(1)
                        ->startOfDay(),
                    'end' => Carbon::now()
                        ->subDays(1)
                        ->endOfDay(),
                ];
            case 'last3days':
                return [
                    'start' => Carbon::now()
                        ->subDays(3)
                        ->startOfDay(),
                    'end' => Carbon::now()
                        ->subDays(1)
                        ->endOfDay(),
                ];
            case 'last5days':
                return [
                    'start' => Carbon::now()
                        ->subDays(5)
                        ->startOfDay(),
                    'end' => Carbon::now()
                        ->subDays(1)
                        ->endOfDay(),
                ];
            case 'lastweek':
                return [
                    'start' => Carbon::now()
                        ->subWeek()
                        ->startOfWeek(),
                    'end' => Carbon::now()
                        ->subWeek()
                        ->endOfWeek(),
                ];
            case 'thisweek':
                return ['start' => Carbon::now()->startOfWeek(), 'end' => Carbon::now()->endOfWeek()];
            case 'thismonth':
                return ['start' => Carbon::now()->startOfMonth(), 'end' => Carbon::now()->endOfMonth()];
            case 'lastmonth':
                return [
                    'start' => Carbon::now()
                        ->subMonth()
                        ->startOfMonth(),
                    'end' => Carbon::now()
                        ->subMonth()
                        ->endOfMonth(),
                ];
            case 'thisyear':
                return ['start' => Carbon::now()->startOfYear(), 'end' => Carbon::now()->endOfYear()];
            case 'lastyear':
                return [
                    'start' => Carbon::now()
                        ->subYear()
                        ->startOfYear(),
                    'end' => Carbon::now()
                        ->subYear()
                        ->endOfYear(),
                ];
            case 'overall':
                return ['start' => Carbon::parse(FakeDataThree::min('date')), 'end' => Carbon::parse(FakeDataThree::max('date'))];
            case 'custom':
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
            default:
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
        }
    }

}
