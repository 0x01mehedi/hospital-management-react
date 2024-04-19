<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch weekly patient count
        $weeklyPatientCount = Patient::select(DB::raw('WEEK(created_at) as week'), DB::raw('COUNT(*) as count'))
            ->groupBy('week')
            ->orderBy('week', 'asc')
            ->get();

        // Pass data to the view
        return view('pages.dashboard', compact('weeklyPatientCount'));
    }
}

