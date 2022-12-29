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
                                                    @foreach ($data as $d)
                                                        {{-- @dd($d) --}}
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
                                                                                    data-bs-target="#modalDefault">Edit
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
                                                        <div class="modal fade" tabindex="-1" id="modalDefault">
                                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                                <div class="modal-content">
                                                                    <a class="close" data-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Modal Title</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('project.update', $d['project_id']) }}"
                                                                            method="POST">
                                                                            @method('put')
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label>Name *</label>
                                                                                    <input type="text"
                                                                                        value="{{ $d['project_name'] }}"
                                                                                        id="project-name" name="project_name"
                                                                                        class="form-control" value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Client</label>
                                                                                    <select name="client_id" class="form-control"
                                                                                        id="">
                                                                                        <option selected disabled>Select Client
                                                                                        </option>
                                                                                        <option
                                                                                            {{ $d['client_id'] == '1' ? 'selected' : '' }}
                                                                                            value="1">City Bussiness</option>
                                                                                        <option
                                                                                            {{ $d['client_id'] == '2' ? 'selected' : '' }}
                                                                                            value="2">AOmega Eye</option>
                                                                                        <option
                                                                                            {{ $d['client_id'] == '3' ? 'selected' : '' }}
                                                                                            value="3">StripSk</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <h3>Budget</h3>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="">Type</label>
                                                                                            <select name="budget_type"
                                                                                                class="form-control"
                                                                                                id="">
                                                                                                <option selected disabled>Select A
                                                                                                    Type
                                                                                                </option>
                                                                                                <option value="total_cost"
                                                                                                    {{ $d['budget_type'] == 'total_cost' ? 'selected' : '' }}>
                                                                                                    Total Cost</option>
                                                                                                <option value="total_hours"
                                                                                                    {{ $d['budget_type'] == 'total_hours' ? 'selected' : '' }}>
                                                                                                    Total Hours</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <label for="">Based On</label>
                                                                                            <select name="budget_based"
                                                                                                class="form-control"
                                                                                                id="">
                                                                                                <option selected disabled>Select A
                                                                                                    Rate
                                                                                                </option>
                                                                                                <option value="bill_rate"
                                                                                                    {{ $d['budget_based'] == 'bill_rate' ? 'selected' : '' }}>
                                                                                                    Bill Rate</option>
                                                                                                <option value="pay_rate"
                                                                                                    {{ $d['budget_based'] == 'pay_rate' ? 'selected' : '' }}>
                                                                                                    Pay Rate</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <label for="">Cost</label>
                                                                                            <div class=" input-group">
                                                                                                <div class="input-group-prepend">
                                                                                                    <div class="input-group-text">
                                                                                                        $
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="text"
                                                                                                    value="{{ $d['budget'] }}"
                                                                                                    class="form-control"
                                                                                                    name="budget">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="">Notify At</label>
                                                                                            <div class=" input-group">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="notify_at"
                                                                                                    value="80" disabled>
                                                                                                <div class="input-group-prepend ">
                                                                                                    <div class="input-group-text">
                                                                                                        % of Budget
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
        
                                                                                    </div>
                                                                                </div>
                                                                                <h3>Team</h3>
                                                                                <div class="form-group">
                                                                                    <h6>Manager</h6>
                                                                                    <label>Oversees and manage project</label>
                                                                                    <select id="managers{{ $d['project_id'] }}"
                                                                                        name="manager{{ $d['project_id'] }}"
                                                                                        class="form-control select2"
                                                                                        multiple="">
                                                                                        <option value="Vito">Vito</option>
                                                                                        <option value="Louis">Louis</option>
                                                                                        <option value="Rizki">Rizki</option>
                                                                                        <option value="Firman">Firman</option>
                                                                                        <option value="Hanif/Amik">Hanif/Amik
                                                                                        </option>
                                                                                        <option value="Hendri">Hendri</option>
                                                                                    </select>
                                                                                </div>
        
                                                                                <div class="form-group">
                                                                                    <h6>User</h6>
                                                                                    <label>Work on Project, will not see other
                                                                                        users</label>
                                                                                    <select id="users{{ $d['project_id'] }}"
                                                                                        name="user_id{{ $d['project_id'] }}"
                                                                                        class="form-control select2"
                                                                                        multiple="">
                                                                                        <option value="Vito">Vito</option>
                                                                                        <option value="Louis">Louis</option>
                                                                                        <option value="Rizki">Rizki</option>
                                                                                        <option value="Firman">Firman</option>
                                                                                        <option value="Hanif/Amik">Hanif/Amik
                                                                                        </option>
                                                                                        <option value="Hendri">Hendri</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <h6>Viwer</h6>
                                                                                    <label>can view team reporst for this
                                                                                        project</label>
                                                                                    <select id="viewer{{ $d['project_id'] }}"
                                                                                        name="viewer{{ $d['project_id'] }}"
                                                                                        class="form-control select2"
                                                                                        multiple="">
                                                                                        <option value="Vito">Vito</option>
                                                                                        <option value="Louis">Louis</option>
                                                                                        <option value="Rizki">Rizki</option>
                                                                                        <option value="Firman">Firman</option>
                                                                                        <option value="Hanif/Amik">Hanif/Amik
                                                                                        </option>
                                                                                        <option value="Hendri">Hendri</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer bg-whitesmoke br">
                                                                                <button type="button" data-backdrop="false"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                        <!-- Modal Content Code -->
                                                        <div class="modal fade" tabindex="-1" id="newProject">
                                                            <div class="modal-dialog modal-dialog-top" role="document">
                                                                <div class="modal-content">
                                                                    <a class="close" data-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Modal Title</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('project.store') }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class="modal-body">
                                                                                <div class="fo rm-group">
                                                                                    <label>Name *</label>
                                                                                    <input type="text" id="project-name"
                                                                                        name="project_name" class="form-control"
                                                                                        value="">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Client</label>
                                                                                    <select id="client" name="client_id"
                                                                                        class="form-control selectric">
                                                                                        <option selected disabled>Select Client
                                                                                        </option>
                                                                                        <option value="1">City Bussiness
                                                                                        </option>
                                                                                        <option value="2">AOmega Eye</option>
                                                                                        <option value="3">StripSk</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <h3>Budget</h3>
                                                                                    <div class="row">
                                                                                        <div class="col-4">
                                                                                            <label for="">Type</label>
                                                                                            <select name="budget_type"
                                                                                                class="form-control"
                                                                                                id="">
                                                                                                <option selected disabled>Select A
                                                                                                    Type</option>
                                                                                                <option value="total_cost">Total
                                                                                                    Cost</option>
                                                                                                <option value="total_hours">Total
                                                                                                    Hours</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <label for="">Based On</label>
                                                                                            <select name="budget_based"
                                                                                                class="form-control"
                                                                                                id="">
                                                                                                <option selected disabled>Select A
                                                                                                    Rate</option>
                                                                                                <option value="bill_rate">Bill Rate
                                                                                                </option>
                                                                                                <option value="pay_rate">Pay Rate
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <label for="">Cost</label>
                                                                                            <div class=" input-group">
                                                                                                <div class="input-group-prepend">
                                                                                                    <div class="input-group-text">
                                                                                                        $
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="budget">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="">Notify At</label>
                                                                                            <div class=" input-group">
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    name="notify_at"
                                                                                                    value="80" disabled>
                                                                                                <div class="input-group-prepend ">
                                                                                                    <div class="input-group-text">
                                                                                                        % of Budget
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
        
                                                                                    </div>
                                                                                </div>
                                                                                <h3>Team</h3>
                                                                                <div class="form-group">
                                                                                    <h6>Manager</h6>
                                                                                    <label>Oversees and manage project</label>
                                                                                    <select id="managers" name="manager"
                                                                                        class="form-control select2"
                                                                                        multiple="">
                                                                                        <option value="Vito">Vito</option>
                                                                                        <option value="Louis">Louis</option>
                                                                                        <option value="Rizki">Rizki</option>
                                                                                        <option value="Firman">Firman</option>
                                                                                        <option value="Hanif/Amik">Hanif/Amik
                                                                                        </option>
                                                                                        <option value="Hendri">Hendri</option>
                                                                                    </select>
                                                                                </div>
        
                                                                                <div class="form-group">
                                                                                    <h6>User</h6>
                                                                                    <label>Work on Project, will not see other
                                                                                        users</label>
                                                                                    <select id="users" name="user_id"
                                                                                        class="form-control select2"
                                                                                        multiple="">
                                                                                        <option value="Vito">Vito</option>
                                                                                        <option value="Louis">Louis</option>
                                                                                        <option value="Rizki">Rizki</option>
                                                                                        <option value="Firman">Firman</option>
                                                                                        <option value="Hanif/Amik">Hanif/Amik
                                                                                        </option>
                                                                                        <option value="Hendri">Hendri</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <h6>Viwer</h6>
                                                                                    <label>can view team reporst for this
                                                                                        project</label>
                                                                                    <select id="viewe" name="viewer"
                                                                                        class="form-control select2"
                                                                                        multiple="">
                                                                                        <option value="Vito">Vito</option>
                                                                                        <option value="Louis">Louis</option>
                                                                                        <option value="Rizki">Rizki</option>
                                                                                        <option value="Firman">Firman</option>
                                                                                        <option value="Hanif/Amik">Hanif/Amik
                                                                                        </option>
                                                                                        <option value="Hendri">Hendri</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer bg-whitesmoke br">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save changes</button>
        
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer bg-light">
                                                                        <span class="sub-text">Modal Footer Text</span>
                                                                    </div>
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
                                        <textarea class="form-control no-resize" name="description" id="default-textarea">Large text area content</textarea>
                                    </div>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input name="billable" type="checkbox" class="custom-control-input" id="billable">
                                    <label class="custom-control-label" for="billable">Billable</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input name="record_activity" type="checkbox" class="custom-control-input" id="recordActivity">
                                    <label class="custom-control-label" for="recordActivity">Record Activity</label>
                                </div>
                                <div class="form-group mt-2">
                                    <label class="form-label">Select Client</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2">      
                                            <option value="" selected></option>                            
                                            <option name="cliend_id" value="1">Aomega</option>                          
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
                                                    <input name="notify_at" type="number" readonly class="form-control" placeholder="80" value="80" required>
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
                                                    <option value="default_option">Never</option>
                                                    <option value="option_select_name">Monthly</option>                          
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
                                                <input name="start_at" type="text" class="form-control date-picker">
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-control custom-switch mt-2">
                                    <input name="non_billable_time" type="checkbox" class="custom-control-input" id="non-billable">
                                    <label class="custom-control-label" for="non-billable">include non-billable time</label>
                                </div>
                            </div>
                            <div class="tab-pane" id="member">
                                <div class="form-group">
                                    <label class="form-label">Manager <div><small>Oversees and manages the project</small></div></label>
                                
                                    <div class="form-control-wrap">
                                        <select name="manager[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            
                                            <option value="1">Takane</option>
                                            <option value="2">Haruka</option>                                       
                                     
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">User <div><small>Works on the project, will not see other users (most commong)</small></div></label>
                                
                                    <div class="form-control-wrap">
                                        <select name="user[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            
                                            <option value="1">Takane</option>
                                            <option value="2">Haruka</option>                                       
                                                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Viewer <div><small>Can view team reports for this project</small></div></label>
                                
                                    <div class="form-control-wrap">
                                        <select name="viewer[]" class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            
                                            <option value="1">Takane</option>
                                            <option value="2">Haruka</option>                                       
                                                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="team">
                                <div class="form-group">
                                    <label class="form-label">Team</label>
                                
                                    <div class="form-control-wrap">
                                        <select name="team[]"class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                            <option value="Disaster">Disaster</option>
                                            <option value="hero_fool">A hero & a fool</option>                                   
                                            <option value="AOmega">AOmega</option>                                       
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
