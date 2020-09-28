<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (Auth::user()->detailsCollected()) {
                return redirect('/profile/academic-details');
            }
            return $next($request);
        });
    }

    /**
     * Display the personal details registration view
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function show(Request $request)
    {
        $userData = $request->user()->typeformPersonal();

        return \Inertia\Inertia::render('Portal/Profile/PersonalDetails', [
            'gender' => $userData['gender'],
            'country' => $userData['country'],
            'state' => $userData['state'],
        ]);
    }

    /**
     * Store the user's personal details
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'gender' => 'required|max:255',
           'race' => 'required|array',
           'race.*' => 'max:255',
           'country' => 'required|max:255',
           'state' => 'required|max:255',
        ]);

        Auth::user()->details()->create([
            'gender' => $validated['gender'],
            'country' => $validated['country'],
            'state' => $validated['state'],
        ]);

        foreach ($validated['race'] as $race) {
            Auth::user()->race()->create([
               'race' => $race,
            ]);
        }

        return Redirect::route('details.academic');
    }
}
