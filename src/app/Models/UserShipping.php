<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShipping extends Model
{
    use HasFactory;

    protected $table = 'user_shipping';
    protected $fillable = [
        'user_id',
        'has_consented',
        'country',
        'state',
        'street',
        'city',
        'zip',
        'shirt_size',
    ];

    /**
     * Get the user
     */
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

}
