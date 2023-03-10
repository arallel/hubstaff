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
        'description',
        'billable',
        'record_activity',
        'budget',
        'client_id',
        'budget_type',
        'budget_based',
        'project_status',
        'notify_at',
        'start',
        'non_billable_time',
        'reset',
    ];
    
  public function clients()
  {
    return $this->belongsTo(Client::class, 'client_id');
  }

  public function members() 
  {
    return $this->hasMany(Project_members::class,'project_id');
  }

  public function team() 
  {
    return $this->hasMany(ProjectTeam::class, 'project_id');
  }
  public function todos()
  {
    return $this->hasMany(todos::class,'project_id'); 
  }
 
}
