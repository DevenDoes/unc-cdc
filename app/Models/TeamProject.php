<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'track',
        'repo_id',
        'repo_name',
        'repo_api_url',
        'repo_html_url',
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
