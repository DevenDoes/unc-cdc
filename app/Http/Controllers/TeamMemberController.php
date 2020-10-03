<?php

namespace App\Http\Controllers;

use App\Actions\Jetstream\AddTeamMember;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends Controller
{
    public function store(Request $request, Team $team)
    {
        if (!$request->user()->hasTeamPermission($team, 'update')) {
            Redirect::route('teams.show', ['team' => $team->id]);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'github_username' => 'required|string|max:255',
        ]);

        $user = User::all()->where('id', $request['user_id'])->first();

        $validator->after(function ($validator) use ($request, $user) {
           if ($user->allTeams()->where('personal_team', 0)->count() > 0) {
               $validator->errors()->add('user_id', 'This user already belongs to a team. Contact an event director if this is a mistake.');
           }
        });

        if ($validator->fails()) {
            return redirect('/teams/' . $team->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $validator->after(function ($validator) use ($team) {
            if ($team->allUsers()->count() > 3) {
                $validator->errors()->add('user_id', 'Teams are allowed a maximum of four members. Contact an event director if this is a mistake.');
            }
        });

        if ($validator->fails()) {
            return redirect('/teams/' . $team->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        /**
         * Get user id number
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.v3+json',
            ])->get('https://api.github.com/users/' . $request['github_username']);

        $response->throw()->json();

        $github_user_id = $response['id'];

        /**
         * Invite the user to the organization
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.v3+json',
            ])->post('https://api.github.com/orgs/Carolina-Data-Challenge/invitations', [
                'invitee_id' => $github_user_id,
                'role' => 'direct_member',
            ]);

        $response->throw()->json();

        /**
         * Invite user to their repository
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.v3+json',
            ])->put('https://api.github.com/repos/Carolina-Data-Challenge/' . $team->project()->first()->toArray()['repo_name'] . '/collaborators/' . $request['github_username'], [
                'permission' => 'push',
            ]);

        $response->throw()->json();

        $addMember = new AddTeamMember;

        $addMember->add(Auth::user(), $team, $user->email, 'admin');

        return Redirect::route('teams.edit', ['team' => $team->id]);
    }
}
