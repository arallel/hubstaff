<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class clientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
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
        // return $request;
        $data = Client::create([
            'client_name' => $request->client_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email_client' => $request->email_client,
            'project_id' => $request->project_id,
            'budget' => $request->budget,
            'auto-invoice' => $request->autoinvoice,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'notify_at' => $request->notify_at,
        ]);
        return $data;
    }

    /**
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
    public function update(Request $request, $client_id)
    {
        $data = Client::findOrFail($client_id);
        $data->update([
            'client_name' => $request->client_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email_client' => $request->email_client,
            'project_id' => $request->project_id,
            'budget' => $request->budget,
            'auto-invoice' => $request->autoinvoice
        ]);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($client_id)
    {
        $data = Client::findOrfail($client_id);
        $data->delete($client_id);
        if($data)
        {
            echo 'Data Deleted';
        }else{
            echo 'error';
        }
    }
}
