<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    public function index()
    {

    }

    public function show(User $user)
    {
        $user->load('profile', 'academics');
        return Inertia::render('Portal/Profile/Show', [
            'isOwner' => Auth::user()->is($user),
            'name' => $user->name,
            'photo' => $user->profile_photo_path ?: '',
            'about' => $user->profile->about,
            'linkedin' => $user->profile->linkedin,
            'github' => $user->profile->github,
            'discord' => $user->profile->discord,
            'twitter' => $user->profile->twitter,
            'facebook' => $user->profile->facebook,
            'instagram' => $user->profile->instagram,
            'share_academics' => $user->profile->share_academics,
            'academics' => function() use ($user) {
                if ($user->profile->share_academics) {
                    return [
                        'school' => $user->academics->school,
                        'school_level' => $user->academics->school_level,
                        'graduation_year' => $user->academics->graduation_year,
                        'major_primary' => $user->academics->major_primary,
                        'major_secondary' => $user->academics->major_secondary,
                        'minor' => $user->academics->minor,
                    ];
                }
                return [
                    'school' => '',
                    'school_level' => '',
                    'graduation_year' => '',
                    'major_primary' => '',
                    'major_secondary' => '',
                    'minor' => '',
                ];
            },
        ]);
    }

    public function edit(User $user)
    {
        if (!Auth::user()->is($user)) {
            return redirect()->route('profile.show', ['user' => $user->id]);
        }
        $user->load('profile');
        return Inertia::render('Portal/Profile/Edit', [
            'name' => $user->name,
            'email' => $user->email,
            'photo' => $user->profile_photo_path ?: '',
            'about' => $user->profile->about,
            'linkedin' => $user->profile->linkedin,
            'github' => $user->profile->github,
            'discord' => $user->profile->discord,
            'twitter' => $user->profile->twitter,
            'facebook' => $user->profile->facebook,
            'instagram' => $user->profile->instagram,
            'share_academics' => $user->profile->share_academics,
        ]);
    }

    public function updatePersonal(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|image|max:10240',
        ]);

        if (isset($validated['photo'])) {
            Auth::user()->updateProfilePhoto($validated['photo']);
        }

        Auth::user()->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return Redirect::route('profile.edit', ['user' => Auth::user()->id]);
    }

    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'about' => 'required|string|max:2500',
        ]);

        Auth::user()->profile()->update([
            'about' => $validated['about'],
        ]);

        return Redirect::route('profile.edit', ['user' => Auth::user()->id]);
    }

    public function updateSocial(Request $request)
    {
        $validated = $request->validate([
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'discord' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
        ]);

        Auth::user()->profile()->update([
            'linkedin' => $validated['linkedin'] ?: '',
            'github' => $validated['github'] ?: '',
            'discord' => $validated['discord'] ?: '',
            'twitter' => $validated['twitter'] ?: '',
        ]);

        return Redirect::route('profile.edit', ['user' => Auth::user()->id]);
    }

    public function updateAcademics(Request $request)
    {
        $validated = $request->validate([
            'share_academics' => 'required|boolean',
        ]);

        Auth::user()->profile()->update([
            'share_academics' => $validated['share_academics'],
        ]);

        return Redirect::route('profile.edit', ['user' => Auth::user()->id]);
    }
}
