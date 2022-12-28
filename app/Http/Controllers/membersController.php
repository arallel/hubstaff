<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\invitational;
use Illuminate\Support\Facades\Mail;
use App\Mail\invitmember;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class membersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get(env('url_api').'/members/all');
        // $response = Http::get('http://127.0.0.1:8080/api/members/all');
        $data = $response->json();
        $response = Http::get(env('url_api').'/project/all');
        // $response = Http::get('http://127.0.0.1:8080/api/project/all');
        $project = $response->json();

        // dd($data);
        return view('admin.member.member',compact('data','project'));
    }
    public function invites()
    {
        $data = invitational::all();
        $response = Http::get(env('url_api').'/members/archive');
        // $response = Http::get('http://127.0.0.1:8080/api/members/all');
        $data = $response->json();
        $response = Http::get(env('url_api').'/project/all');
        // $response = Http::get('http://127.0.0.1:8080/api/project/all');
        $project = $response->json();
        // dd($data);
        return view('admin.project.invites',compact('data','project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        $response = Http::get(env('url_api').'/members/archive');
        $members = $response->json();
       $data = collect($members)->where('status','=','0');
       $response = Http::get(env('url_api').'/project/all');
       // $response = Http::get('http://127.0.0.1:8080/api/project/all');
       $project = $response->json();
        return view('admin.member.memberarchive',compact('data','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $payrate = $request->payrate;
        // dd($payrate)

        for ($i=0; $i < count($email) ; $i++) { 
            $token = str::random(6);
            $datatoken = invitational::create([
             'token' => $token,
             'email' => $email[$i], 
             'company' => 'vito', 
             'role' => $request->role, 
             'payrate' => $payrate[$i], 
             'status' => '0',
            ]);
            $invitational = invitational::where('email','=',$email[$i])->first();
            // dd($invitational);
            Mail::to($email[$i])->send(new invitmember($invitational));
        }
        
        dd('data dikirim');
    }
    public function requestregister($token,$company)
    {
      $data = invitational::where('token','=',$token)->Where('company','=',$company)->limit(1)->first();
    //   dd($data);
      return view('admin.member.invitelogin',compact('data'));
    }

    /**p
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
