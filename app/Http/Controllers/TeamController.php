<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return Inertia::render('Portal/Teams/Create', [
            'github' => Auth::user()->profile()->first()->toArray()['github'],
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/(^[A-Za-z0-9 ]+$)+/',
            'track' => 'required|string|in:finance,science,humanities,culture',
            'github_username' => 'required|string|max:255',
        ], [
            'name.regex' => 'You may only use alphanumeric characters (no symbols).'
        ]);

        $validator->after(function ($validator) {
            if (Auth::user()->ownedTeams()->where('personal_team', 0)->count() > 0) {
                $validator->errors()->add('name', 'You can only belong to one team. Contact an event director if this is a mistake.');
            }
        });

        if ($validator->fails()) {
            return redirect('/teams/create')
                ->withErrors($validator)
                ->withInput();
        }

        $repoName = str_replace(' ', '-', $request['name'] . '-' . Auth::user()->id);

        /**
         * Generate the repository from a template
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.baptiste-preview+json',
            ])->post('https://api.github.com/repos/Carolina-Data-Challenge/project-template/generate',[
                'name' => $repoName,
                'description' => "This is your teams's private repository for submitting your project.",
                'private' => true,
            ]);

        $validator->after(function ($validator) use($response) {
           if (!$response->successful()) {
               $validator->errors()->add('github_username', 'A system error (#1) has occurred. Contact an event director if the issue persists.');
           }
        });

        if ($validator->fails()) {
            return redirect('/teams/create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'response' => $response->json(),
                ]);
        }

        /**
         * Transfer the repository to the organization
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.v3+json',
            ])->post('https://api.github.com/repos/DevenDoes/' . $repoName . '/transfer',[
                'new_owner' => 'Carolina-Data-Challenge'
            ]);

        $validator->after(function ($validator) use($response) {
            if (!$response->successful()) {
                $validator->errors()->add('github_username', 'A system error (#2) has occurred. Contact an event director if the issue persists.');
           }
        });

        if ($validator->fails()) {
            return redirect('/teams/create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'response' => $response->json(),
                ]);
        }

        $repo_id = $response['id'];
        $repo_name = $response['name'];

        /**
         * Get user id number
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.v3+json',
            ])->get('https://api.github.com/users/' . $request['github_username']);

        $validator->after(function ($validator) use($response) {
            if (!$response->successful()) {
                $validator->errors()->add('github_username', 'A system error (#3) has occurred. Contact an event director if the issue persists.');
            }
        });

        if ($validator->fails()) {
            return redirect('/teams/create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'response' => $response->json(),
                ]);
        }

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

        $validator->after(function ($validator) use($response) {
            if (!$response->successful()) {
                $validator->errors()->add('github_username', 'A system error (#4) has occurred. Contact an event director if the issue persists.');
            }
        });

        if ($validator->fails()) {
            return redirect('/teams/create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'response' => $response->json(),
                ]);
        }

        /**
         * Invite user to their repository
         */
        $response = Http::retry(5, 100)
            ->withToken(config('services.github.token'))
            ->withHeaders([
                'accept' => 'application/vnd.github.v3+json',
            ])->put('https://api.github.com/repos/Carolina-Data-Challenge/' . $repo_name . '/collaborators/' . $request['github_username'], [
                'permission' => 'push',
            ]);

        $validator->after(function ($validator) use($response) {
            if (!$response->successful()) {
                $validator->errors()->add('github_username', 'A system error (#5) has occurred. Contact an event director if the issue persists.');
            }
        });

        if ($validator->fails()) {
            return redirect('/teams/create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'response' => $response->json(),
                ]);
        }

        $team = Auth::user()->ownedTeams()->create([
           'name' => $request['name'],
           'personal_team' => false,
        ]);

        User::where('id', Auth::user()->id)->update([
            'current_team_id' => $team->id,
        ]);

        $team->project()->create([
            'track' => $request['track'],
            'repo_id' => $repo_id,
            'repo_name' => $repo_name,
            'repo_api_url' => 'https://api.github.com/repos/Carolina-Data-Challenge/' . $repo_name,
            'repo_html_url' => 'https://github.com/Carolina-Data-Challenge/' . $repoName,
        ]);

        return Redirect::route('teams.show', ['team' => $team->id]);

    }

    public function show(Team $team)
    {
        return Inertia::render('Portal/Teams/Show', [
            'team' => $team->load('project'),
        ]);
    }

    public function edit(Team $team)
    {
        if (!$team->hasUser(Auth::user())) {
            Redirect::route('teams.show', ['team' => $team->id]);
        }

        $team_users = [];

        foreach ($team->allUsers() as $user) {
            array_push($team_users, $user->load('profile'));
        }

        return Inertia::render('Portal/Teams/Edit', [
            'team' => $team->load('project'),
            'team_users' => $team_users,
            'all_users' => User::all()
                ->load('profile')
                ->sortBy('name')
                ->diff($team->allUsers()),
        ]);
    }

    public function update(Request $request, Team $team)
    {
        //
    }

    public function destroy(Team $team)
    {
        //
    }
}
