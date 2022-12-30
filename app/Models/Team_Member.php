<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team_Member extends Model
{
    use HasFactory;
    protected $table = 'team_members';
    protected $fillable = [
        'member_id',
        'roles',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function member() {
        return $this->belongsTo(User::class, 'member_id');
    }
}
