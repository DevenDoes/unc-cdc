<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    public function show()
    {

        $schedule = Schedule::all();

//        foreach($schedule as $event) {
//
//        }

        return Inertia::render('Portal/Schedule', [
            'schedule' => $schedule,
        ]);
    }
}
