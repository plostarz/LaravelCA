<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use App\Models\Race;
use App\Models\Circuit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard with next Grand Prix countdown.
     */
    public function index()
    {
        // Find the next upcoming race
        $nextRace = Race::whereDate('date', '>=', now())
                        ->orderBy('date','asc')
                        ->first();

        return view('dashboard', compact('nextRace'));
    }
}
