<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
