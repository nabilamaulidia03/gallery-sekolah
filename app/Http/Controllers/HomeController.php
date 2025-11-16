<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // Data counts
        $eventsCount = Event::count();
        $upcomingCount = Event::where('date', '>=', Carbon::today())->count();
        $pastCount = Event::where('date', '<', Carbon::today())->count();

        // Prepare data for chart: Events per month (dummy or real)
        // Misalnya real data: ambil 6 bulan terakhir
        $months = [];
        $eventsPerMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('M Y');
            $months[] = $month;
            $eventsPerMonth[] = Event::whereMonth('date', Carbon::now()->subMonths($i)->month)
                                     ->whereYear('date', Carbon::now()->subMonths($i)->year)
                                     ->count();
        }

        // Upcoming vs Past
        $upcoming = $upcomingCount;
        $past = $pastCount;

        return view('home', compact(
            'eventsCount','upcomingCount','pastCount',
            'months','eventsPerMonth','upcoming','past'
        ));
    }
}
