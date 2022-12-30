<?php

namespace App\Http\Controllers;

use App\Models\Project_members;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use App\Models\Team;
use App\Http\Resources\ProjectResource;
use Illuminate\Support\Facades\Http;


class ProjectController extends Controller
{
    public function index()
    {
        $response = Http::get(env('url_api').'/project/all');
        $project = $response->json();
        $data = collect($project)->where('project_status','=','0');
        
        $project_archives = Http::get(env('url_api').'/project/all');
        $archives = $project_archives->json();
        $archive = collect($archives)->where('project_status','=','1');
       
         return view('admin.project.project-all',compact('data','archive')); 

    }
    public function archive()
    {
        
    //    dd($data);
       return view('admin.project.project-archive',compact('data'));

    }
    public function store(Request $request)
    {

        $start = date('Y/m/d',strtotime($request->start));
        if ($request->client_id == 'null') {
            $request->client_id = null;
        }
      
        $data = Http::post(env('url_api').'/project/store', [
            'project_name' => $request->project_name,
            'descriptoin' => $request->description,
            'billable' => $request->billable,
            'record_activity' => $request->record_activity,
            'client_id' => $request->client_id,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'budget' => $request->budget,
            'notify_at' => $request->notify_at,
            'project_status' => '0',
            'manager' => $request->manager,
            'user' => $request->user,
            'viewer' => $request->viewer,
            'team' => $request->team,
            'start' => $start,
            'non_billable_time' => $request->non_billable_time
        ]);
        // return $data;
        
        return redirect()->route('project.index');
    }
    public function update(Request $request,$project_id)
    {
        $start = date('Y/m/d',strtotime($request->start));
        if ($request->client_id == 'null') {
            $request->client_id = null;
        }
        $data = Http::patch(env('url_api').'/project/update/' . $project_id, [
            'project_name' => $request->project_name,
            'descriptoin' => $request->description,
            'billable' => $request->billable,
            'record_activity' => $request->record_activity,
            'client_id' => $request->client_id,
            'budget_type' => $request->budget_type,
            'budget_based' => $request->budget_based,
            'budget' => $request->budget,
            'notify_at' => $request->notify_at,
            'project_status' => '0',
            'manager' => $request->manager,
            'user' => $request->user,
            'viewer' => $request->viewer,
            'team' => $request->team,
            'start' => $start,
            'non_billable_time' => $request->non_billable_time
        ]);
        return $data;
      
        // $data = Project::findOrFail($project_id);
        //   $data->update([
        //       'project_name' => $request->project_name,
        //       'budget' => $request->budget,
        //       'budget_type' => $request->budget_type,
        //       'budget_based' => $request->budget_based,
        //       'notify_at' => $request->notify_at,
        //       'client_id' => $request->client_id,
        //   ]);
        //   return redirect()->route('project.index');
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
