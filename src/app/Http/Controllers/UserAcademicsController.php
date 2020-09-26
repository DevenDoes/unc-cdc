<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserAcademicsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (Auth::user()->academicsCollected()) {
                return redirect('/profile/shipping-details');
            }
            return $next($request);
        });
    }

    /**
     * Display the academic details registration view
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function show(Request $request)
    {
        $userData = $request->user()->typeformAcademic();

        return Inertia::render('Portal/Profile/AcademicDetails.vue', [
            'school' => $userData['school'],
            'school_level' => $userData['school_level'],
            'primary_major' => $userData['primary_major'],
            'secondary_major' => $userData['secondary_major'],
            'minor' => $userData['minor'],
            'graduation_year' => $userData['graduation_year'],
        ]);
    }

    /**
     * Store the user's academic details
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school' => 'required|max:255',
            'school_level' => 'required|max:255',
            'graduation_year' => 'required|max:255',
            'major_primary' => 'required|max:255',
            'major_secondary' => 'required|max:255',
            'minor' => 'required|max:255',
        ]);

        Auth::user()->academics()->create([
            'school' => $validated['school'],
            'school_level' => $validated['school_level'],
            'graduation_year' => $validated['graduation_year'],
            'major_primary' => $validated['major_primary'],
            'major_secondary' => $validated['major_secondary'],
            'minor' => $validated['minor'],
        ]);

        return Redirect::route('details.shipping');
    }
}
