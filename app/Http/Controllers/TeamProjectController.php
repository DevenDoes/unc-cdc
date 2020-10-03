<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TeamProjectController extends Controller
{
    public function update(Request $request, Team $team)
    {
        if (!$request->user()->hasTeamPermission($team, 'update')) {
            Redirect::route('teams.show', ['team' => $team->id]);
        }

        $validated = $request->validate([
            'track' => 'required|string|in:finance,science,humanities,culture',
        ]);

        $team->project()->update([
           'track' => $validated['track'],
        ]);

        return Redirect::route('teams.edit', ['team' => $team->id]);
    }
}
