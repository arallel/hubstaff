<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\todos;

class TodosApiController extends Controller
{
    public function index()
    {
        return todos::with('project','usermember')->get();
    }
    public function store(Request $request)
    {
        $data = todos::create([
            'task' => $request->task,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);
        return ['data' => $data];
    }
    public function update(Request $request,$todos_id)
    {
        $data = todos::findOrFail($todos_id);
        $data->update([
            'task' => $request->task,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,

        ]);
        return ['data' => $data];
    }
    public function show($todos_id)
    {
      $data = todos::findOrFail($todos_id);
      return $data;
    }
    public function delete($todos_id)
    {
        $data = todos::findOrFail($todos_id);
        $data->delete($todos_id);
        if($data){
            return 'data dihapus';
        }else{
           return  'data masih ada';
        }
    }
}
