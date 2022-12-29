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
                                    <h2>Client</h2>
                                    <ul class="nav nav-tabs mt-n3">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#active">Active ({{ count($clients) }})</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#archive">Archive ({{ count($archives) }})</a>
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
                                                        <th>Name</th>
                                                        <th>Budget</th>
                                                        <th>Auto Invoicing</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($clients as $client)
                                                       <tr>
                                                        <td class="text-center"> <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div></td>
                                                        <td>
                                                         @if ($client['client_name'] == !null)
                                                            {{ $client['client_name'] }} 
                                                         @else
                                                             None
                                                         @endif
                                                        </td>
                                                        <td>
                                                            @if ($client['budget'] == !null)
                                                            {{ $client['budget'] }} 
                                                         @else
                                                             None
                                                         @endif
                                                        </td>
                                                        <td>
                                                            @if ($client['auto-invoice'] == 1)
                                                                On
                                                            @else
                                                                Off
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class=" dropdown-toggle" href="#"
                                                                    data-bs-toggle="dropdown">Action </a>
                                                                <div class="dropdown-menu">
                                                                    <ul class="link-list-opt">
                                                                        <li>
                                                                            <button type="button" class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editclient{{ $client['client_id'] }}">Edit client</button></li>
                                                                        <li>
                                                                            <form action="{{ route('client.archive',$client['client_id']) }}" method="post">
                                                                                @csrf
                                                                                <button name="archive" value="1" class="dropdown-item">Archive client</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                       </tr>
                                                       <div class="modal fade" tabindex="-1" id="editclient{{ $client['client_id'] }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">New Client</h5>
                                                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                </div>
                                                                <form action="{{ route('client.update',$client['client_id']) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <ul class="nav nav-tabs mt-n3">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link active" data-bs-toggle="tab"
                                                                                    href="#generalupdate">General</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-bs-toggle="tab"
                                                                                    href="#contactupdate">Contact Info</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-bs-toggle="tab"
                                                                                    href="#projectupdate">Project/Wo</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="nav-link" data-bs-toggle="tab"
                                                                                    href="#budgetupdate">Budget</a>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane active" id="generalupdate">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="default-01">Client Name*</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" value="{{ $client['client_name'] }}" name="client_name" id="client_name" class="form-control" id="default-01" placeholder="Input placeholder">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="default-textarea">Address</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <textarea class="form-control no-resize" name="address" id="default-textarea">{{ $client['address'] }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="budgetupdate">
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
                                                                                
                                                                               
                                                                            </div>
                                                                            <div class="tab-pane" id="contactupdate">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="default-01">Phone Number*</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" name="phone_number" id="phone_number" value="{{ $client['phone_number'] }}" class="form-control" id="default-01" placeholder="Input placeholder">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="default-01">Email Address</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" name="email_client" value="{{ $client['email_client'] }}" id="email_client" class="form-control" id="default-01" placeholder="Input placeholder">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane" id="projectupdate">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Project / Work Orders</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <select name="project_id"class="form-select js-select2"  data-placeholder="Select Multiple options">
                                                                                            <option selected disabled>Select Project / Work Orders</option>
                                                                                            @foreach ($projects as $project)
                                                                                            <option {{ $client['project_id'] == $project['project_id'] ? 'selected' : '' }} value="{{ $project['project_id'] }}">{{ $project['project_name'] }}</option>                                   
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
                                                   @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="archive">
                                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">
                                                            No
                                                        </th>
                                                        <th>Name</th>
                                                        <th>Budget</th>
                                                        <th>Auto Invoicing</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($archives as $archive)
                                                       <tr>
                                                        <td class="text-center"> <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div></td>
                                                        <td>
                                                         @if ($archive['client_name'] == !null)
                                                            {{ $archive['client_name'] }} 
                                                         @else
                                                             None
                                                         @endif
                                                        </td>
                                                        <td>
                                                            @if ($archive['budget'] == !null)
                                                            {{ $archive['budget'] }} 
                                                         @else
                                                             None
                                                         @endif
                                                        </td>
                                                        <td>
                                                            @if ($archive['auto-invoice'] == 1)
                                                                On
                                                            @else
                                                                Off
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class=" dropdown-toggle" href="#"
                                                                    data-bs-toggle="dropdown">Action </a>
                                                                <div class="dropdown-menu">
                                                                    <ul class="link-list-opt">
                                                                        <li>
                                                                            <button type="button" class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editclient{{ $archive['client_id'] }}">Edit client</button></li>
                                                                        <li>
                                                                            <form action="{{ route('client.archive',$archive['client_id']) }}" method="post">
                                                                                @csrf
                                                                                <button name="archive" value="1" class="dropdown-item">Archive client</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
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

    <!-- Modal New client Code -->
    <div class="modal fade" tabindex="-1" id="newProjectnew">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Client</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <ul class="nav nav-tabs mt-n3">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab"
                                    href="#general">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#contact">Contact Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#project">Project/Wo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#budget">Budget</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Client Name*</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="client_name" id="client_name" class="form-control" id="default-01" placeholder="Input placeholder">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-textarea">Address</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" name="address" id="default-textarea"></textarea>
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
                                
                               
                            </div>
                            <div class="tab-pane" id="contact">
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Phone Number*</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" id="default-01" placeholder="Input placeholder">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-01">Email Address</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="email_client" id="email_client" class="form-control" id="default-01" placeholder="Input placeholder">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="project">
                                <div class="form-group">
                                    <label class="form-label">Project / Work Orders</label>
                                    <div class="form-control-wrap">
                                        <select name="project_id"class="form-select js-select2"  data-placeholder="Select Multiple options">
                                            <option selected disabled>Select Project / Work Orders</option>
                                            @foreach ($projects as $project)
                                            <option value="{{ $project['project_id'] }}">{{ $project['project_name'] }}</option>                                   
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
