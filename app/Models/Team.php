<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'created_by',
    ];

    public function teamMembers()
    {
        return $this->hasMany(Team_Member::class,'team_id');
    }

    public function project() {
        return $this->hasMany(ProjectTeam::class, 'team_id');
    }
}
