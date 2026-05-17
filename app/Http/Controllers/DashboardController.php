<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Mission;

class DashboardController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::count();

        $drivers = Driver::count();

        $missions = Mission::count();

        return view('dashboard', compact(
            'vehicles',
            'drivers',
            'missions'
        ));
    }
}