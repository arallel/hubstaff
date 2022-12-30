<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamApiController extends Controller
{
    public function index(){
        return Team::all();
    }
}
