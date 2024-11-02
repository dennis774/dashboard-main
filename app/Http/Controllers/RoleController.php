<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function admin_dashboard()
    {
        return view('roles.admin.dashboard');
    }

    public function general_dashboard()
    {
        return view('roles.general.dashboard');
    }

    public function kuwago_dashboard()
    {
        return view('roles.kuwago.dashboard');
    }
    public function uddesign_dashboard()
    {
        return view('roles.uddesign.dashboard');
    }
}
