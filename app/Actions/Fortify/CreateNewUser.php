<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class CreateNewUser implements CreatesNewUsers
{

    //use Newsletter;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => ucwords(strtolower($input['name'])),
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                // Add user to personal team
                $this->createTeam($user);
                // Add to Mailchimp mailing list
                $name = explode(" ", $user->name);
                $lastName = end($name);
                $firstName = '';
                foreach ($name as $nameFragment) {
                    if($nameFragment != end($name)) {
                        $firstName .= $nameFragment . " ";
                    }
                }
                print($firstName);
                print($lastName);
                Newsletter::subscribeOrUpdate($user->email, [
                    'FNAME' => $firstName,
                    'LNAME' => $lastName,
                ]);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ], 'Carolina Data Challenge'));
    }
}
