<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Inertia\CurrentUserController;
use Laravel\Jetstream\Http\Controllers\Inertia\OtherBrowserSessionsController;
use Laravel\Jetstream\Http\Controllers\Inertia\ProfilePhotoController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamMemberController;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->configurePermissions();

        Jetstream::ignoreRoutes();

        Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
            Route::group(['middleware' => ['auth', 'verified']], function () {

                Route::delete('/user/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
                    ->name('other-browser-sessions.destroy');

                Route::delete('/user', [CurrentUserController::class, 'destroy'])
                    ->name('current-user.destroy');

                Route::delete('/user/profile-photo', [ProfilePhotoController::class, 'destroy'])
                    ->name('current-user-photo.destroy');

                Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
                Route::put('/teams/{team}/members/{user}', [TeamMemberController::class, 'update'])->name('team-members.update');
                Route::delete('/teams/{team}/members/{user}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');
            });
        });

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', 'Administrator', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Administrator users can perform any action.');

//        Jetstream::role('editor', 'Editor', [
//            'read',
//            'create',
//            'update',
//        ])->description('Editor users have the ability to read, create, and update.');
    }
}
