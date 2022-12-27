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
                                    <ul class="nav nav-pills mt-2">
                                        <li class="nav-item">
                                            <a class="ml-2 nav-link active bg-primary" id="home-tab3"
                                                href="{{ url('project/all') }}">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('project/archive') }}">Archived</a>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-3 mt-5">
                                            <input type="text" class="form-control rounded-pill"
                                                placeholder="Search projects" name="" id="">
                                        </div>
                                        <div class="col-9 mt-5 text-end">
                                            {{-- <button class="btn btn-info" data-toggle="modal" data-target="#newProject">New
                                                Project</button> --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#newProject">Modal Default</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-inner">
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
                                                        @if ($d['user_id']== null)
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
                                                            data-target="#editProject{{ $d['project_id']}}">Edit
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
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
@endpush
