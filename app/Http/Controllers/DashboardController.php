<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $todayEarnings = Transaction::whereDate('created_at', today())->sum('total');

        $yesterdayEarnings = Transaction::whereDate('created_at', today()->subDay())->sum('total');

        $thisMonthEarnings = Transaction::whereMonth('created_at', today()->month)->sum('total');

        $lastMonthEarnings = Transaction::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ])->sum('total');

        return view('dashboard', compact('todayEarnings', 'yesterdayEarnings', 'thisMonthEarnings', 'lastMonthEarnings'));
    }
}
