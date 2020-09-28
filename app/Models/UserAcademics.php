<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAcademics extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'school',
        'school_level',
        'graduation_year',
        'major_primary',
        'major_secondary',
        'minor',
    ];

    /**
     * Get the user
     */
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }


}
