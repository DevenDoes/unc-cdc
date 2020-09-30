<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\Array_;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use CascadeSoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The relationships to cascade soft delete
     *
     * @var string[]
     */
    protected $cascadeDeletes = [
        'details',
        'academics',
        'shipping',
        'race',
        'profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Determine if the user has completed the personal details form.
     *
     * @return bool
     */
    public function detailsCollected()
    {
        if ($this->details()->exists()) {
            return true;
        }
        return false;
    }

    /**
     * Determine if the user has completed the academic details form.
     *
     * @return bool
     */
    public function academicsCollected()
    {
        if ($this->academics()->exists()) {
            return true;
        }
        return false;
    }

    /**
     * Determine if the user had completed the prize details form.
     *
     * @return bool
     */
    public function shippingCollected()
    {
        if ($this->shipping()->exists()) {
            return true;
        }
        return false;
    }

    /**
     * Get the user's personal details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function details()
    {
        return $this->hasOne('App\Models\UserDetails');
    }

    /**
     * Get the user's academic details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function academics()
    {
        return $this->hasOne('App\Models\UserAcademics');
    }

    /**
     * Get the user's prize details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipping()
    {
        return $this->hasOne('App\Models\UserShipping');
    }

    /**
     * Get the user's race.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function race()
    {
        return $this->hasMany('App\Models\UserRace');
    }

    /**
     * Get the user's profile details.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Models\UserProfile');
    }

    /**
     * Get the user's registration data from Typeform.
     *
     * @return \Illuminate\Support\Collection
     */
    public function typeform()
    {
        return DB::table('typeform')->where('email', Auth::user()->email)->get();
    }

    /**
     * Get the user's personal details provided via Typeform registration.
     *
     * @return array|string[]
     */
    public function typeformPersonal()
    {
        $data = DB::table('typeform')
            ->select('gender', 'country', 'state')
            ->where('email', $this->email)
            ->first();
        if (!$data) {
            return [
                'gender' => '',
                'country' => '',
                'state' => '',
            ];
        }
        return [
            'gender' => $data->gender,
            'country' => $data->country,
            'state' => $data->state,
        ];
    }

    /**
     * Get the user's academic details provided via Typeform registration.
     *
     * @return array|string[]
     */
    public function typeformAcademic()
    {
        $data = DB::table('typeform')
            ->select('school', 'school_level', 'primary_major', 'secondary_major', 'minor', 'graduation_year')
            ->where('email', $this->email)
            ->first();
        if(!$data) {
            return [
                'school' => '',
                'school_level' => '',
                'primary_major' => '',
                'secondary_major' => '',
                'minor' => '',
                'graduation_year' => '',
            ];
        }
        return [
            'school' => $data->school,
            'school_level' => $data->school_level,
            'primary_major' => $data->primary_major,
            'secondary_major' => $data->secondary_major,
            'minor' => $data->minor,
            'graduation_year' => $data->graduation_year,
        ];
    }

    /**
     * Get the user's shipping details provided via Typeform registration.
     *
     * @return array|string[]
     */
    public function typeformShipping()
    {
        $data = DB::table('typeform')
            ->select('address_country', 'address_state', 'address_street', 'address_city', 'address_zip', 'prize_consent', 'shirt_size')
            ->where('email', $this->email)
            ->first();
        if(!$data) {
            return [
                'country' => '',
                'state' => '',
                'city' => '',
                'street' => '',
                'zip' => '',
                'consent' => '',
                'shirt_size' => '',
            ];
        }
        return [
            'country' => $data->address_country,
            'state' => $data->address_state,
            'city' => $data->address_city,
            'street' => $data->address_street,
            'zip' => $data->address_zip,
            'consent' => $data->prize_consent,
            'shirt_size' => $data->shirt_size,
        ];
    }

}
