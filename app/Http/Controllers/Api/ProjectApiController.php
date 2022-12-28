<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\screen;

class ProjectApiController extends Controller
{
    public function index()
    {
        return $data = Project::all();
        // return ProjectResource::collection($data);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
          'project_name'  => 'required'
        ]);

        $data = Project::create([
            'project_name' => $request->project_name,
            'description' => $request->description,
            'billable' => $request->billable,
            'record_activity' => $request->record_activity,
            'client_id' => $request->cliend_id,
           /*  'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'budget' => $request->budget,
            'notify_at' => $request->notify_at, */
           /*  'project_name' => $request->project_name,
            'budget' => $request->budget,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'project_status' => '0',
            'notify_at' => $request->notify_at,
            'client_id' => $request->client_id, */
        ]);
        return ['data' => $data];
        // return redirect()->route('project.index');
    }
    public function update(Request $request,$project_id)
    {
        $this->validate($request,[
            'project_name'  => 'required'
          ]);
          $data = Project::findOrFail($project_id);
          $data->update([
              'project_name' => $request->project_name,
              'budget' => $request->budget,
              'budget_type' => $request->budget_type,
              'budget_based' => $request->budget_based,
              'project_status' => $request->project_name,
              'notify_at' => $request->notify_at,
              'client_id' => $request->client_id,
          ]);
          return ['data' => $data];
        //   return redirect()->route('project.index')
    }
    public function show($project_id)
    {
      $data = Project::findOrFail($project_id);
      return $data;
    }
    public function delete($project_id)
    {
        $data = Project::findOrFail($project_id);
        $data->delete($project_id);
        if($data){
            return 'data dihapus';
        }else{
           return  'data masih ada';
        }
    }
    public function test(Request $request)
    {
    //   $data = screen::create([
    //     'image' => $request->image,
    //   ]);
    return ['image' => $request->image];
    }
}
