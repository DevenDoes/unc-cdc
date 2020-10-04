<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProjectSubmissionController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Portal/Project/Index', [
            'projects' => Project::all()->unique('github')->toArray(),
        ]);
    }

    public function vdt(Request $request)
    {
        return Inertia::render('Portal/Project/VDT', [
            'projects' => Project::all()->unique('github')->where('sponsor_prizes', 'vdt')->toArray(),
        ]);
    }

    public function captech(Request $request)
    {
        return Inertia::render('Portal/Project/Captech', [
            'projects' => Project::all()->unique('github')->where('sponsor_prizes', 'captech')->toArray(),
        ]);
    }

    public function show(Request $request, Project $project)
    {
        $members = Project::all()
            ->where('github', $project->github)
            ->map(function ($item, $key) {
                return $item->user()->get()[0];
            });

        return Inertia::render('Portal/Project/Show', [
            'project' => $project,
            'members' => $members,
        ]);
    }

    public function create(Request $request)
    {
        if (Auth::user()->project()->exists()) {
            return Redirect::route('dashboard', []);
        }

        $users = User::where('email_verified_at', '!=', null)
            ->orderBy('name')
            ->get();

        return Inertia::render('Portal/Project/Create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->project()->exists()) {
            return Redirect::route('dashboard', []);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'track' => 'required|string|in:finance,science,humanities,culture',
            'github' => 'required|string|url|max:255',
            'member_one' => 'required|integer|exists:users,id',
            'member_two' => 'nullable|integer|exists:users,id',
            'member_three' => 'nullable|integer|exists:users,id',
            'member_four' => 'nullable|integer|exists:users,id',
            'prizes' => 'required|string|in:yes,no',
            'sponsor_prizes' => 'required|string|in:no,captech,vdt',
        ]);

        $users = User::all();

        if ($validated['member_one']) {
            $users->find($validated['member_one'])
            ->project()
            ->create([
                'name' => $validated['name'],
                'track' => $validated['track'],
                'github' => $validated['github'],
                'prizes' => $validated['prizes'] == 'yes',
                'sponsor_prizes' => $validated['sponsor_prizes'],
            ]);
        }

        if ($validated['member_two']) {
            $users->find($validated['member_two'])
                ->project()
                ->create([
                    'name' => $validated['name'],
                    'track' => $validated['track'],
                    'github' => $validated['github'],
                    'prizes' => $validated['prizes'] == 'yes',
                    'sponsor_prizes' => $validated['sponsor_prizes'],
                ]);
        }

        if ($validated['member_three']) {
            $users->find($validated['member_three'])
                ->project()
                ->create([
                    'name' => $validated['name'],
                    'track' => $validated['track'],
                    'github' => $validated['github'],
                    'prizes' => $validated['prizes'] == 'yes',
                    'sponsor_prizes' => $validated['sponsor_prizes'],
                ]);
        }

        if ($validated['member_four']) {
            $users->find($validated['member_four'])
                ->project()
                ->create([
                    'name' => $validated['name'],
                    'track' => $validated['track'],
                    'github' => $validated['github'],
                    'prizes' => $validated['prizes'] == 'yes',
                    'sponsor_prizes' => $validated['sponsor_prizes'],
                ]);
        }

        return Redirect::route('dashboard', []);
    }
}
