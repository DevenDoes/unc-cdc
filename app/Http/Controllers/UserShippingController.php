<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (Auth::user()->shippingCollected()) {
                return redirect('/dashboard');
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
        $userData = $request->user()->typeformShipping();

        return Inertia::render('Portal/Profile/ShippingDetails', [
            'country' => $userData['country'],
            'state' => $userData['state'],
            'city' => $userData['city'],
            'street' => $userData['street'],
            'zip' => $userData['zip'],
            'consent' => $userData['consent'],
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
            'country' => 'nullable|max:255',
            'state' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'street' => 'nullable|max:255',
            'zip' => 'nullable|numeric',
            'consent' => 'required|boolean',
        ]);

        Auth::user()->shipping()->create([
            'country' => $validated['country'],
            'state' => $validated['state'],
            'city' => $validated['city'],
            'street' => $validated['street'],
            'zip' => $validated['zip'],
            'has_consented' => $validated['consent'],
        ]);

        return Redirect::route('dashboard');
    }
}
