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

    public function showUser()
    {
        $app = app('firebase.database');

        $data = $app->getReference('users/')->getValue();


        return view('dashboard.users', ['data' => $data]);
    }
}
