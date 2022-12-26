@extends('layouts.app')

@section('title', 'Project Page')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')<div class="main-content">
        <style>
            .modal-backdrop.show {
                opacity: .5;
            }
        </style>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">

                        <div class="card-body">
                            <h1>Project (4)</h1>
                            <div class="d-flex justify-content-between">
                                <ul class="nav nav-pills" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" href="#">Active</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('project/archive') }}">Archived</a>
                                    </li>
                                </ul>
                                <div>
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#newProject">New
                                        Project</button>



                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table-striped table" id="sortable-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                <th>Task Name</th>
                                                <th>Team</th>
                                                <th>Members</th>
                                                <th>Budget</th>
                                                <th>Trackable by me</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>
                                                        <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td>{{ $d->project_name }}</td>
                                                    <td>
                                                        @if ($d->teams == null)
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
                                                        @if ($d->user_id == null)
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
                                                            data-target="#editProject{{ $d->project_id }}">Edit Budget</button>
                                                    </td>

                                                    <td><i class="fa-regular fa-circle-check"></i></td>
                                                    <td>
                                                        <div class="badge badge-success">active</div>
                                                    </td>
                                                    <td><button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="#editProject{{ $d->project_id }}"
                                                                data-toggle="modal">Edit Project</a>
                                                            <a class="dropdown-item" href="#">Archive Project</a>
                                                            <a class="dropdown-item" href="#">Duplicate Project</a>
                                                            <form action="{{ route('project.delete',$d->project_id) }}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <a onclick="this.parentNode.submit();" class="dropdown-item" href="#">Delete Project</a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal " tabindex="-1" role="dialog"
                                                    id="editProject{{ $d->project_id }}">
                                                    <div class="modal-dialog" style="" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Update Project</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            {{--  @phpT
                                                             $modal = DB::table('projects')->where('project_id','=',$id)->first()
                                                            @endphp --}}
                                                            <form action="{{ route('project.update', $d->project_id) }}"
                                                                method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Name *</label>
                                                                        <input type="text"
                                                                            value="{{ $d->project_name }}"
                                                                            id="project-name" name="project_name"
                                                                            class="form-control" value="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Client</label>
                                                                        <select name="client_id" class="form-control" id="">
                                                                            <option selected disabled>Select Client</option>
                                                                            <option  {{ $d->client_id == '1' ? 'selected' : '' }} value="1">City Bussiness</option>
                                                                            <option  {{ $d->client_id == '2' ? 'selected' : '' }} value="2">AOmega Eye</option>
                                                                            <option  {{ $d->client_id == '3' ? 'selected' : '' }} value="3">StripSk</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <h3>Budget</h3>
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <label for="">Type</label>
                                                                                <select name="budget_type"
                                                                                    class="form-control" id="">
                                                                                    <option selected disabled>Select A Type
                                                                                    </option>
                                                                                    <option value="total_cost"
                                                                                        {{ $d->budget_type == 'total_cost' ? 'selected' : '' }}>
                                                                                        Total Cost</option>
                                                                                    <option value="total_hours"
                                                                                        {{ $d->budget_type == 'total_hours' ? 'selected' : '' }}>
                                                                                        Total Hours</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <label for="">Based On</label>
                                                                                <select name="budget_based"
                                                                                    class="form-control" id="">
                                                                                    <option selected disabled>Select A Rate
                                                                                    </option>
                                                                                    <option value="bill_rate"
                                                                                        {{ $d->budget_based == 'bill_rate' ? 'selected' : '' }}>
                                                                                        Bill Rate</option>
                                                                                    <option value="pay_rate"
                                                                                        {{ $d->budget_based == 'pay_rate' ? 'selected' : '' }}>
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
                                                                                        value="{{ $d->budget }}"
                                                                                        class="form-control"
                                                                                        name="budget">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="">Notify At</label>
                                                                                <div class=" input-group">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="notify_at" value="80"
                                                                                        disabled>
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
                                                                            class="form-control select2" multiple="">
                                                                            <option value="Vito">Vito</option>
                                                                            <option value="Louis">Louis</option>
                                                                            <option value="Rizki">Rizki</option>
                                                                            <option value="Firman">Firman</option>
                                                                            <option value="Hanif/Amik">Hanif/Amik</option>
                                                                            <option value="Hendri">Hendri</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <h6>User</h6>
                                                                        <label>Work on Project, will not see other
                                                                            users</label>
                                                                        <select id="users" name="user_id"
                                                                            class="form-control select2" multiple="">
                                                                            <option value="Vito">Vito</option>
                                                                            <option value="Louis">Louis</option>
                                                                            <option value="Rizki">Rizki</option>
                                                                            <option value="Firman">Firman</option>
                                                                            <option value="Hanif/Amik">Hanif/Amik</option>
                                                                            <option value="Hendri">Hendri</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <h6>Viwer</h6>
                                                                        <label>can view team reporst for this
                                                                            project</label>
                                                                        <select id="viewe" name="viewer"
                                                                            class="form-control select2" multiple="">
                                                                            <option value="Vito">Vito</option>
                                                                            <option value="Louis">Louis</option>
                                                                            <option value="Rizki">Rizki</option>
                                                                            <option value="Firman">Firman</option>
                                                                            <option value="Hanif/Amik">Hanif/Amik</option>
                                                                            <option value="Hendri">Hendri</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer bg-whitesmoke br">
                                                                    <button type="button" data-backdrop="false"
                                                                        class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        


        <!-- Modal Project -->
        <div class="modal fade" tabindex="-1" role="dialog" id="newProject">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="fo rm-group">
                                <label>Name *</label>
                                <input type="text" id="project-name" name="project_name" class="form-control"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label>Client</label>
                                <select id="client" name="client_id" class="form-control selectric">
                                    <option selected disabled>Select Client</option>
                                    <option value="1">City Bussiness</option>
                                    <option value="2">AOmega Eye</option>
                                    <option value="3">StripSk</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <h3>Budget</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="">Type</label>
                                        <select name="budget_type" class="form-control" id="">
                                            <option selected disabled>Select A Type</option>
                                            <option value="total_cost">Total Cost</option>
                                            <option value="total_hours">Total Hours</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Based On</label>
                                        <select name="budget_based" class="form-control" id="">
                                            <option selected disabled>Select A Rate</option>
                                            <option value="bill_rate">Bill Rate</option>
                                            <option value="pay_rate">Pay Rate</option>
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
                                            <input type="text" class="form-control" name="budget">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Notify At</label>
                                        <div class=" input-group">
                                            <input type="text" class="form-control" name="notify_at" value="80"
                                                disabled>
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
                                <select id="managers" name="manager" class="form-control select2" multiple="">
                                    <option value="Vito">Vito</option>
                                    <option value="Louis">Louis</option>
                                    <option value="Rizki">Rizki</option>
                                    <option value="Firman">Firman</option>
                                    <option value="Hanif/Amik">Hanif/Amik</option>
                                    <option value="Hendri">Hendri</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <h6>User</h6>
                                <label>Work on Project, will not see other users</label>
                                <select id="users" name="user_id" class="form-control select2" multiple="">
                                    <option value="Vito">Vito</option>
                                    <option value="Louis">Louis</option>
                                    <option value="Rizki">Rizki</option>
                                    <option value="Firman">Firman</option>
                                    <option value="Hanif/Amik">Hanif/Amik</option>
                                    <option value="Hendri">Hendri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h6>Viwer</h6>
                                <label>can view team reporst for this project</label>
                                <select id="viewe" name="viewer" class="form-control select2" multiple="">
                                    <option value="Vito">Vito</option>
                                    <option value="Louis">Louis</option>
                                    <option value="Rizki">Rizki</option>
                                    <option value="Firman">Firman</option>
                                    <option value="Hanif/Amik">Hanif/Amik</option>
                                    <option value="Hendri">Hendri</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush
