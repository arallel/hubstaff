<?php

namespace App\Http\Controllers;

use App\Models\todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Http::get(env('url_api').'/members/all');
        $member = $members->json();
        $projects = Http::get(env('url_api').'/project/all');
        $project = $projects->json();
        $todos = Http::get(env('url_api').'/task/all');
        $todo = $todos->json();

        return view('admin.todos.todosindex',compact('member','project','todo'));

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
        // dd($request->project_id);
        $response = Http::post(env('url_api').'/task/store', [
            'task' => $request->task,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);
        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(todos $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todos $todos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy(todos $todos)
    {
        //
    }
}
