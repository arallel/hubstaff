<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class screen extends Model
{
    use HasFactory;
    protected $table = 'screenshoots';
    protected $fillable = [
       'image',
    ];
}
