<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_members extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'member_id',
        'roles',
    ];

    public function project() {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function member() {
        return $this->belongsTo(User::class, 'member_id');
    }
 
}
