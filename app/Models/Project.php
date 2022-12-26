<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'project_name',
        'budget',
        'budget_type',
        'budget_based',
        'project_status',
        'notify_at',
        'client_id',
    ];
    
}
