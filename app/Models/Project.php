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
    ];
    
  /**
   * Get all of the comments for the Project
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function clients()
  {
    return $this->belongsTo(Client::class, 'client_id');
  }
}
