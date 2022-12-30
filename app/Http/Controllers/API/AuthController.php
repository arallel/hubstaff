<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $data = User::all();
        return [
          'data' => $data, 
        ];
    }
    public function register(Request $request)
    {
        // dd($request->role);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'company' => $request->company,
            'payrate' => $request->payrate,
            'status' => '1',
            'project' => $request->project,
        ]);
        return [
            "data" => $data, 
        ];
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:4',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('login')->accessToken;
                $response = ['token' => $token];
                return [
                    "response" => $response, 
                    "pesan" => 'sukses',
                ];
            } else {
                $response = ["message" => "Password salah"];
                return [
                    "response" => $response, 
                    "pesan" => 'gagal pasword salah',
                ];            }
        } else {
            $response = ["message" =>'akun tidak di temukan'];
            return response($response, 422);
        }
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
