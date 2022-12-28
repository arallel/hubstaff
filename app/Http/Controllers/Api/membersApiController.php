<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\invitational;
use Illuminate\Support\Facades\Mail;
use App\Mail\invitmember;
use Illuminate\Support\Str;


class membersApiController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function archive()
    {
        return invitational::all();
    }
    public function store(Request $request)
    {
        $email = $request->email;
        $payrate = $request->payrate;
        // dd($payrate);
        $count = collect($request->email)->count();
        

        for ($i=0; $i < $count ; $i++) { 
            $token = str::random(6);
            $datatoken = invitational::create([
             'token' => $token,
             'email' => $email, 
             'company' => 'vito', 
             'role' => $request->role, 
             'payrate' => $payrate[$i],
             'status' => '0', 
            ]);
            $invitational = invitational::where('email','=', $email)->get();
            Mail::to($email)->send(new invitmember($invitational));
        }
        return 'berhasil';
    }
}
