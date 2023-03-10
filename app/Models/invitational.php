<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitational extends Model
{
    use HasFactory;
    protected $table = 'invitationals';
    protected $primaryKey = 'invit_id';
    protected $fillable = [
         'email',
         'token',
         'status',
         'company',
         'role',
         'payrate',
    ];
}
