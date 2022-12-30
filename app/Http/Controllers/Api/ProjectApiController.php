<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectTeam;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\screen;
use App\Models\Project_members;

class ProjectApiController extends Controller
{
    public function index()
    {
        return $data = Project::with('members.member','team')->get();
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
            'client_id' => $request->client_id,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'budget' => $request->budget,
            'notify_at' => $request->notify_at,
            'project_status' => '0',
            'start' => $request->start,
            'reset' => 'never',
            'non_billable_time' => $request->non_billable_time,
        ]);

        if($request->filled('manager')) {
            foreach ($request->manager as $memberId) {
            Project_members::create([
                'project_id' => $data->project_id,
                'member_id' => $memberId,
                'roles' => 'manager',
            ]);
           }
        }

        if($request->filled('user')){
            foreach ($request->user as $memberId) {
                Project_members::create([
                    'project_id' => $data->project_id,
                    'member_id' => $memberId,
                    'roles' => 'user',
                ]);
            }   
        }
        if($request->filled('viewer')){
            foreach ($request->viewer as $memberId) {
                Project_members::create([
                    'project_id' => $data->project_id,
                    'member_id' => $memberId,
                    'roles' => 'viewer',
                ]);
            }   
        }

        if($request->filled('team')) {
            foreach($request->team as $teamId) {
                ProjectTeam::create([
                    'project_id' => $data->project_id,
                    'team_id'=>$teamId,
                ]);
            }
        }

        
        return ['data' => $data];
     
    }
    public function update(Request $request,Project $project_id)
    {
       
        $this->validate($request,[
            'project_name'  => 'required'
          ]);
          $project_id->update([
              'project_name' => $request->project_name,
              'description' => $request->description,
              'billable' => $request->billable,
              'record_activity' => $request->record_activity,
              'client_id' => $request->client_id,
          ]);
          return ['data' => $project_id];
       
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
