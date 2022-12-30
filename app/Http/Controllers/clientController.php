<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Http;


class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get(env('url_api').'/client/all');
        $client = $response->json();
        $response = Http::get(env('url_api').'/project/all');
        $projects = $response->json();
        
        $clients = collect($client)->where('status','=','0');
        $archives = collect($client)->where('status','=','1');
        // dd($archives);
        return view('admin.client.clientindex',compact('clients','projects','archives'));
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
        $response = Http::post(env('url_api').'/client/store', [
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
        return redirect()->route('client.index');
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
            'auto-invoice' => $request->autoinvoice,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'notify_at' => $request->notify_at,
       ]);
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archive(Request $request,$client_id)
    {
        // dd($request->archive);
        $data = Client::findOrFail($client_id);
        $data->update([
            'status' => $request->archive,
        ]);
        return redirect()->route('client.index');
    }
}
