<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Http;


class ProjectController extends Controller
{
    public function index()
    {
        //  $data = Project::all(); 
        $response = Http::get('http://127.0.0.1:8080/api/project/all');
        $data = $response->json();
        
    //    dd($response->collect());

        //  return response()->json(ProjectResource::collection($response), 200);
         return view('admin.project.project-all',['data'=> $data]); 


    }
    public function store(Request $request)
    {
        
        // $this->validate($request,[
        //   'project_name'  => 'required'
        // ]);

        
        $data = Project::create([
            'project_name' => $request->project_name,
            'budget' => $request->budget,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'project_status' => '0',
            'notify_at' => $request->notify_at,
            'client_id' => $request->client_id,
        ]);
        return redirect()->route('project.index');
    }
    public function update(Request $request,$project_id)
    {
        $data = Project::findOrFail($project_id);
          $data->update([
              'project_name' => $request->project_name,
              'budget' => $request->budget,
              'budget_type' => $request->budget_type,
              'budget_based' => $request->budget_based,
              'notify_at' => $request->notify_at,
              'client_id' => $request->client_id,
          ]);
          return redirect()->route('project.index');
    }
    public function delete($project_id)
    {
        $data = Project::findOrFail($project_id);
        $data->delete($project_id);
        if($data){
            return redirect()->route('project.index');
        }else{
            return back();
        }
    }
    public function duplicate($project_id)
    {
        $data = Project::findOrFail($project_id);
        $duplicate = Project::create([
            'project_name' => $data->project_name,
            'budget' => $data->budget,
            'budget_type' => $data->budget_type,
            'budget_based' => $data->budget_based,
            'project_status' => '0',
            'notify_at' => $data->notify_at,
            'client_id' => $data->client_id,
        ]);
        return redirect()->route('project.index');

    }
}
