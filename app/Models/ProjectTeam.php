<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;
    protected $table = 'project_teams';
    protected $fillable = [
        'project_id',
        'team_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function team ()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
