<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\User;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{

    public function update(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'numeric|required',
            'days' => 'array|required'
        ]);

        $employee = User::find($validated['user_id']);
        $days = $validated['days'];

        $employee->availability()->update([
            'monday_am' => $days[0]['am'],
            'monday_pm' => $days[0]['pm'],
            'tuesday_am' => $days[1]['am'],
            'tuesday_pm' => $days[1]['pm'],
            'wednesday_am' => $days[2]['am'],
            'wednesday_pm' => $days[2]['pm'],
            'thursday_am' => $days[3]['am'],
            'thursday_pm' => $days[3]['pm'],
            'friday_am' => $days[4]['am'],
            'friday_pm' => $days[4]['pm'],
            'saturday_am' => $days[5]['am'],
            'saturday_pm' => $days[5]['pm'],
            'sunday_am' => $days[6]['am'],
            'sunday_pm' => $days[6]['pm'],
        ]);

        return $employee;
    }
}
