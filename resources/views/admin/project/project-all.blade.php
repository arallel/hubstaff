@extends('layouts.app')
@push('style')
@endpush
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">

                                </div>
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <h2>Project</h2>
                                    <ul class="nav nav-tabs mt-n3">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#active">Active ({{count($data)}})</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#archive">Archive ({{count($archive)}})</a>
                                        </li>
                                       
                                    </ul>
                                    <div class="row">
                                    
                                        <div class="col-12 mt-5 text-end">
                                   
                                            <!-- Modal Trigger Code -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newProjectnew">New Project</button>

                                            <!-- Modal Content Code -->
                                           
                                        </div>
                                    </div>

                                </div>
                              
                                <div class="card-inner">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="active">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Task Name</th>
                                                        <th>Team</th>
                                                        <th>Members</th>
                                                        <th>Budget</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @dump($member) --}}
                                                    @foreach ($data as $d)
                                                        {{-- @dump($d) --}}
                                                        <tr>
                                                            <td>
                                                                <div class="sort-handler">
                                                                    <i class="fas fa-th"></i>
                                                                </div>
                                                            </td>
                                                            <td>{{ $d['project_name'] }}</td>
                                                            <td>
                                                                @if ($d['teams'] == null)
                                                                    None
                                                                @else
                                                                    <div class="row">
        
                                                                        <img alt="image"
                                                                            src="{{ asset('img/avatar/avatar-5.png') }}"
                                                                            class="rounded-circle" width="35"
                                                                            data-toggle="tooltip" title="Wildan Ahdian">
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($d['user_id'] == null)
                                                                    None
                                                                @else
                                                                    <div class="row">
        
                                                                        <img alt="image"
                                                                            src="{{ asset('img/avatar/avatar-5.png') }}"
                                                                            class="rounded-circle" width="35"
                                                                            data-toggle="tooltip" title="Wildan Ahdian">
                                                                        <img alt="image"
                                                                            src="{{ asset('img/avatar/avatar-5.png') }}"
                                                                            class="rounded-circle" width="35"
                                                                            data-toggle="tooltip" title="Wildan Ahdian">
                                                                        <img alt="image"
                                                                            src="{{ asset('img/avatar/avatar-5.png') }}"
                                                                            class="rounded-circle" width="35"
                                                                            data-toggle="tooltip" title="Wildan Ahdian">
                                                                    </div>
                                                                @endif
        
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="progress" data-height="4" data-toggle="tooltip"
                                                                    title="100%">
                                                                    <div class="progress-bar bg-success" data-width="100"></div>
                                                                </div>
                                                                <button class="btn" data-toggle="modal"
                                                                    data-target="#editProject{{ $d['project_id'] }}">Edit
                                                                    Budget</button>
                                                            </td>
        
                                                            <td>
                                                                <div class="badge rounded-pill bg-success">active</div>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <a class=" dropdown-toggle" href="#"
                                                                        data-bs-toggle="dropdown">Action </a>
                                                                    <div class="dropdown-menu">
                                                                        <ul class="link-list-opt">
                                                                            <li><button type="button" class="dropdown-item"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#editProject{{ $d['project_id'] }}">Edit
                                                                                    Project</button></li>
                                                                            <li>
                                                                                <form
                                                                                    action="{{ route('project.duplicate', $d['project_id']) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="dropdown-item">Duplicate
                                                                                        Project</button>
                                                                                </form>
                                                                            </li>
                                                                            <li>
                                                                                <form
                                                                                    action="{{ route('project.delete', $d['project_id']) }}"
                                                                                    method="POST">
                                                                                    @method('delete')
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="dropdown-item">Delete
                                                                                        Project</button>
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" tabindex="-1" id="editProject{{ $d['project_id'] }}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Project</h5>
                                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <em class="icon ni ni-cross"></em>
                                                                        </a>
                                                                    </div>
                                                                    <form action="{{ route('project.update', $d) }}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body">
                                                                            <ul class="nav nav-tabs mt-n3">
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link active" data-bs-toggle="tab"
                                                                                        href="#generalEdit{{ $loop->iteration }}">General</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" data-bs-toggle="tab"
                                                                                        href="#budgetEdit{{ $loop->iteration }}">Budget</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" data-bs-toggle="tab"
                                                                                        href="#memberEdit{{ $loop->iteration }}">Members</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" data-bs-toggle="tab"
                                                                                        href="#teamEdit{{ $loop->iteration }}">Teams</a>
                                                                                </li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                                <div class="tab-pane active" id="generalEdit{{ $loop->iteration }}">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="default-01">Name*</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <input required type="text" name="project_name" id="project_name" class="form-control" id="default-01" value="{{ $d['project_name'] }}" placeholder="Input placeholder">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="default-textarea">Description</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <textarea class="form-control no-resize" name="description" id="default-textarea">{{ $d['billable'] }}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="hidden" name="billable" value="0">
                                                                                        <input {{ $d["billable"] == 1 ? "checked" : "" }} name="billable" type="checkbox" value="1" class="custom-control-input" id="billableEdit{{ $loop->iteration }}">
                                                                                        <label class="custom-control-label" for="billableEdit{{ $loop->iteration }}">Billable</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="hidden" name="record_activity" value="0">
                                                                                        <input {{ $d['billable'] == 1 ? 'checked' : '' }} name="record_activity" type="checkbox" value="1" class="custom-control-input" id="recordActivityEdit{{ $loop->iteration }}">
                                                                                        <label class="custom-control-label" for="recordActivityEdit{{ $loop->iteration }}">Record Activity</label>
                                                                                    </div>
                                                                                    <div class="form-group mt-2">
                                                                                        <label class="form-label">Select Client</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <select name="client_id" class="form-select js-select2">      
                                                                                                <option value="null" selected>No Client</option>                            
                                                                                                <option {{ $d['client_id'] == 1 ? "selected" : "" }} value="1">Aomega</option>                          
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane" id="budgetEdit{{ $loop->iteration }}">
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Type*</label>
                                                                                                <div class="form-control-wrap">
                                                                                                    <select name="budget_type" class="form-select js-select2">
                                                                                                        <option >Select Type</option>          
                                                                                                        <option {{ $d['budget_type'] == 'total_cost' ? 'selected': '' }} value="total_cost">Total Cost</option>
                                                                                                        <option {{ $d['budget_type'] == 'total_hours' ? 'selected' : '' }} value="total_hours">Total Hours</option>                          
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Based On*</label>
                                                                                                <div class="form-control-wrap">
                                                                                                    <select name="budget_based" class="form-select js-select2">
                                                                                                        <option>Select Base</option>          
                                                                                                        <option {{ $d['budget_based'] == 'bill_rate' ? 'selected' : '' }} value="bill_rate">Bll Rate</option>
                                                                                                        <option {{ $d['budget_based'] == 'pay_rate' ? 'selected' : '' }} value="pay_rate">Pay Rate</option>                          
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label" for="default-03">Cost*</label>
                                                                                                <div class="form-control-wrap">
                                                                                                    <div class="form-icon form-icon-left">
                                                                                                        <em class="icon ni ni-sign-mxn-alt"></em>
                                                                                                    </div>
                                                                                                    <input value="{{ $d['budget'] }}" name="budget" type="number" class="form-control" id="default-03" placeholder="0.0">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-lg-6">
                                                                                            <div class="form-group mt-3">
                                                                                                <div class="form-control-wrap">
                                                                                                    <div class="input-group">
                                                                                                        <input name="notify_at" type="number" class="form-control" placeholder="80" value="{{ $d['notify_at'] }}" required>
                                                                                                        <div class="input-group-append">
                                                                                                            <span class="input-group-text" id="basic-addon2">% of budget</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row  mt-2">
                                                                                        <div class="col-12 col-lg-6">
                                                                                            <div class="form-group ">
                                                                                                <label class="form-label">Resets</label>
                                                                                                <div class="form-control-wrap">
                                                                                                    <select name="reset" class="form-select js-select2">
                                                                                                        <option {{ $d['reset'] == 'never' ? 'selected' : '' }} value="never">Never</option>
                                                                                                        <option {{ $d['reset'] == 'never' ? 'selected' : '' }} value="monthly">Monthly</option>                          
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Start at*</label>
                                                                                                <div class="form-control-wrap">
                                                                                                    <div class="form-icon form-icon-right">
                                                                                                        <em class="icon ni ni-calendar-alt"></em>
                                                                                                    </div>
                                                                                                    <input value="{{ $d['start'] }}" name="start" type="text" class="form-control date-picker">
                                                                                                </div>
                                                            
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="custom-control custom-switch mt-2">
                                                                                        <input type="hidden" name="non_billable_time" value="0">
                                                                                        <input {{ $d['non_billable_time'] == 1 ? 'checked' : ''}} name="non_billable_time" value="1" type="checkbox" class="custom-control-input" id="non-billable{{ $loop->iteration }}">
                                                                                        <label class="custom-control-label" for="non-billable{{ $loop->iteration }}">include non-billable time</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane" id="memberEdit{{ $loop->iteration }}">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Manager <div><small>Oversees and manages the project</small></div></label>
                                                                                    
                                                                                        <div class="form-control-wrap">
                                                                                            <select name="manager[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                                                                                @if ($d['members'])      
                                                                                                    @php  
                                                                                                        $memberOfProject = $d['members']
                                                                                                    @endphp
                                                                                                    @foreach ($members as $member)
                                                                                                        @foreach ($memberOfProject as $item)
                                                                                                            @if($member['role'] == 'manager')
                                                                                                            @if($item['member_id'] == $member['user_id'])
                                                                                                            <option selected value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                                @break
                                                                                                            @else
                                                                                                            <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                                @break
                                                                                                            @endif
                                                                                                        @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                @else 
                                                                                                @foreach ($members as $member)
                                                                                                @if ($member['role'] == 'manager')
                                                                                                    
                                                                                                <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                @endif
                                                                                                @endforeach
                                                                                                @endif
                                                                                               
                                                                                                
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">User <div><small>Works on the project, will not see other users (most common)</small></div></label>
                                                                                    
                                                                                        <div class="form-control-wrap">
                                                                                            <select name="user[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">

                                                                                                @if ($d['members'])      
                                                                                                    @php  
                                                                                                        $memberOfProject = $d['members']
                                                                                                    @endphp
                                                                                                    @foreach ($members as $member)
                                                                                                        @foreach ($memberOfProject as $item)
                                                                                                            @if($member['role'] == 'user')
                                                                                                            @if($item['member_id'] == $member['user_id'])
                                                                                                            <option selected value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                                @break
                                                                                                            @else
                                                                                                            <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                   
                                                                                                            @endif
                                                                                                        @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                @else 
                                                                                                @foreach ($members as $member)
                                                                                                @if ($member['role'] == 'user')
                                                                                                    
                                                                                                <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                @endif
                                                                                                @endforeach
                                                                                                @endif
                                                                                               
                                                                                                
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Viewer <div><small>Can view team reports for this project</small></div></label>
                                                                                    
                                                                                        <div class="form-control-wrap">
                                                                                            <select name="viewer[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">

                                                                                                @if ($d['members'])      
                                                                                                    @php  
                                                                                                        $memberOfProject = $d['members']
                                                                                                    @endphp
                                                                                                    @foreach ($members as $member)
                                                                                                        @foreach ($memberOfProject as $item)
                                                                                                            @if($member['role'] == 'viewer')
                                                                                                            @if($item['member_id'] == $member['user_id'])
                                                                                                            <option selected value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                                @break
                                                                                                            @else
                                                                                                            <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                           
                                                                                                            @endif
                                                                                                        @endif
                                                                                                        @endforeach
                                                                                                    @endforeach
                                                                                                @else 
                                                                                                @foreach ($members as $member)
                                                                                                @if ($member['role'] == 'viewer')
                                                                                                    
                                                                                                <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                                                                                @endif
                                                                                                @endforeach
                                                                                                @endif
                                                                                               
                                                                                               
                                                                                                                                   
                                                                                                                           
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane" id="teamEdit{{ $loop->iteration }}">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Team</label>
                                                                                        
                                                                                        <div class="form-control-wrap">
                                                                                            <select name="team[]"class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                                                                                @if ($d['team'])      
                                                                                                @php  
                                                                                                    $teamOfProject = $d['team']
                                                                                                @endphp
                                                                                                @foreach ($teams as $team)
                                                                                                    @foreach ($teamOfProject as $item)
                                                                                                       
                                                                                                        @if($item['team_id'] == $team['id'])
                                                                                                        <option selected value="{{ $team['id'] }}">{{ $team['name'] }}</option>
                                                                                                            @break
                                                                                                        @else
                                                                                                        <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>
                                                                                                            @break
                                                                                                        @endif
                                                                                                    
                                                                                                    @endforeach
                                                                                                @endforeach
                                                                                            @else 
                                                                                            @foreach ($teams as $team)
                                                                                           
                                                                                                
                                                                                            <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>
                                                                                      
                                                                                            @endforeach
                                                                                            @endif
                                                                                                
                                                                                               
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer bg-light">
                                                                            <a href="#" data-bs-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary">Cancel</a>
                                                                            <button href="#" type="submit"  class="btn btn-info">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>                                                       
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="archive">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Name</th>
                                                        <th>Teams</th>
                                                        <th>Members</th>
                                                        <th>To-dos</th>
                                                        <th>Budget</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($archive as $arc)
                                                        <tr>
                                                            <td>{{ $arc['project_name'] }}</td>
                                                            <td>@if ($arc['teams'])
                                                                {{ $arc['teams'] }}
                                                            @else
                                                                None
                                                            @endif</td>
                                                            <td>
                                                                @if ($arc['user_id'])
                                                                    {{ $arc['user_id'] }}
                                                                @else
                                                                    None
                                                                @endif
                                                            </td>
                                                            <td>
                                                                Count Hasil where dari project_id di table todos
                                                            </td>
                                                            <td>
                                                                {{ $arc['budget'] }}
                                                            </td>
                                                            <td>Action</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal New Project Code -->
    <div class="modal fade" tabindex="-1" id="newProjectnew">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Project</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <ul class="nav nav-tabs mt-n3">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab"
                                    href="#general">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#budget">Budget</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#member">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#team">Teams</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Name*</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="project_name" id="project_name" class="form-control" id="default-01" placeholder="Input placeholder">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-textarea">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" name="description" id="default-textarea"></textarea>
                                    </div>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input name="billable" type="checkbox" value="1" class="custom-control-input" id="billable">
                                    <label class="custom-control-label" for="billable">Billable</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input name="record_activity" type="checkbox" value="1" class="custom-control-input" id="recordActivity">
                                    <label class="custom-control-label" for="recordActivity">Record Activity</label>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="form-label">Select Client</label>
                                    <div class="form-control-wrap">
                                        <select name="client_id" class="form-select js-select2">      
                                            <option value="null" selected>No Client</option>         
                                            @foreach ($clients as $client )
                                                
                                            <option value="{{ $client['client_id'] }}">{{ $client['client_name'] }}</option>                          
                                            @endforeach                   
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="budget">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label">Type*</label>
                                            <div class="form-control-wrap">
                                                <select name="budget_type" class="form-select js-select2">
                                                    <option value="total_cost">Total Cost</option>
                                                    <option value="total_hours">Total Hours</option>                          
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label">Based On*</label>
                                            <div class="form-control-wrap">
                                                <select name="budget_based" class="form-select js-select2">
                                                    <option value="bill_rate">Bll Rate</option>
                                                    <option value="pay_rate">Pay Rate</option>         
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Cost*</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-sign-mxn-alt"></em>
                                                </div>
                                                <input name="budget" type="number" class="form-control" id="default-03" placeholder="0.0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group mt-3">
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <input name="notify_at" type="number" class="form-control" placeholder="80" value="80" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">% of budget</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group ">
                                            <label class="form-label">Resets</label>
                                            <div class="form-control-wrap">
                                                <select name="reset" class="form-select js-select2">
                                                    <option value="never">Never</option>
                                                    <option value="monthly">Monthly</option>                          
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Start at*</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-calendar-alt"></em>
                                                </div>
                                                <input name="start" type="text" class="form-control date-picker">
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-switch mt-2">
                                    <input name="non_billable_time"  value="1" type="checkbox" class="custom-control-input" id="non-billable">
                                    <label class="custom-control-label" for="non-billable">include non-billable time</label>
                                </div>
                            </div>
                            <div class="tab-pane" id="member">
                                <div class="form-group">
                                    <label class="form-label">Manager <div><small>Oversees and manages the project</small></div></label>
                                
                                    <div class="form-control-wrap">
                                        <select name="manager[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            @foreach ($members as $member)
                                            @if ($member['role'] == 'manager')
                                                
                                            <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                            @endif
                                                
                                            @endforeach
                                                                                 
                                     
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">User <div><small>Works on the project, will not see other users (most common)</small></div></label>
                                
                                    <div class="form-control-wrap">
                                        <select name="user[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            @foreach ($members as $member)
                                            @if ($member['role'] == 'user')
                                                
                                            <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                            @endif
                                                
                                            @endforeach                                  
                                                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Viewer <div><small>Can view team reports for this project</small></div></label>
                                
                                    <div class="form-control-wrap">
                                        <select name="viewer[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            
                                            @foreach ($members as $member)
                                            @if ($member['role'] == 'viewer')
                                                
                                            <option value="{{ $member['user_id'] }}">{{ $member['name'] }}</option>
                                            @endif
                                                
                                            @endforeach                                   
                                                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="team">
                                <div class="form-group">
                                    <label class="form-label">Team</label>
                                
                                    <div class="form-control-wrap">
                                        <select name="team[]"class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">                    
                                            @foreach ($teams as $team)
                                            <option value="{{ $team['id'] }}">{{ $team['name'] }}</option>                                       
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <a href="#" data-bs-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary">Cancel</a>
                        
                        <button href="#" type="submit"  class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
@endpush
