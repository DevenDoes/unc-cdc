<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    public function index()
    {

    }

    public function show(User $user)
    {
        // Create user profile if it doesn't exist
        if (!$user->profile()->exists()) {
            $user->profile()->create([
                'about' => '',
                'linkedin' => '',
                'github' => '',
                'discord' => '',
                'twitter' => '',
                'facebook' => '',
                'instagram' => '',
                'share_academics' => False,
            ]);
        }
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

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
