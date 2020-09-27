<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start',
        'end',
        'type',
        'event',
        'url',
    ];

    public function isActive()
    {

    }

    public function isArchived()
    {

    }
}
