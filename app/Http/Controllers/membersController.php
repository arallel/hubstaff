<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\invitational;
use Illuminate\Support\Facades\Mail;
use App\Mail\invitmember;
use Illuminate\Support\Str;



class membersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        // dd($data);
        return view('admin.project.member',compact('data'));
    }
    public function invites()
    {
        $data = invitational::all();
        // dd($data);
        return view('admin.project.invites',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
