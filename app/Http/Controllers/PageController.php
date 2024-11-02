<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function expenses_index()
    {
        return view('pages.Expenses.index');
    }
    public function feedback_index()
    {
        return view('pages.Feedbacks.index');
    }
    public function promo_index()
    {
        return view('pages.Promos.index');
    }
    public function sales_index()
    {
        return view('pages.Sales.index');
    } 
}
