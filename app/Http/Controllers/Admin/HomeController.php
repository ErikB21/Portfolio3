<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){
        $messages = Message::all();
        // Recupera i conteggi delle visite dalla cache, se esistono
        $dailyVisits = Cache::remember('daily_visits', 600, function () {
            return Visit::getDailyVisits();
        });

        $weeklyVisits = Cache::remember('weekly_visits', 600, function () {
            return Visit::getWeeklyVisits();
        });

        $monthlyVisits = Cache::remember('monthly_visits', 600, function () {
            return Visit::getMonthlyVisits();
        });
        return view('admin.home', compact('messages', 'dailyVisits', 'weeklyVisits', 'monthlyVisits'));
    }
}
