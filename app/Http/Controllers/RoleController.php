<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function kuwago_one_dashboard()
    {
        return view('kuwago_one.dashboard');
    }

    public function kuwago_two_dashboard()
    {
        return view('kuwago_two.dashboard');
    }
    public function uddesign_dashboard()
    {
        return view('uddesign.dashboard');
    }
}
