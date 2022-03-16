<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',['currentVisits'=>Visit::all()]);
    }

    public function show(Visit $visit)
    {
        return view('dashboard.show',['currentVisit'=>$visit]);
    }
}
