<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboardMap');
    }

    public function setting()
    {
        return view('dashboard.setting');
    }
}
