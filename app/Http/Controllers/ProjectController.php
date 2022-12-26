<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::all();
        return view('admin.project.project-all',compact('data'));
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
}
