<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'client_id';
    protected $fillable = [
        'client_name',
        'address',
   'phone_number',
   'email_client',
     'project_id',
         'budget',
   'auto-invoice',
   'budget_type',
   'budget_based',
   'notify_at',
   'status',
    ];

    /**
     * Get all of the comments for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
