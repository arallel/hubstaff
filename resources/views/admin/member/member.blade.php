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
                                                data-bs-target="#exampleModal">AddMember</button>
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
                                             @dd($d)
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">Invite Member</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('members.mail') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <h6 class="fw-bold">Invite Via Mail</h6>
                                                    <div id="mail-container">
                                                        <div id="mail-invite" class="row">
                                                            <div class="col-12 col-lg-6">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input name="email[]" id="email1" type="email" class="form-control"
                                                                        required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-5">
                                                                <div class="form-group">
                                                                    <label>Pay Rate</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                $/Hour
                                                                            </div>
                                                                        </div>
                                                                        <input name="payrate[]" id="pay1" type="text"
                                                                            class="form-control currency">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-lg-1 align-self-center">
                                                                <a href=""><i class="fa-solid fa-xmark"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <a href="#" class="nav-link" onclick="newMailInvite()">+ Add Another</a>
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select class="form-control selectric" name="role">
                                                            <option value="manager">Organization Manager</option>
                                                            <option value="project_manager">Project Manager</option>
                                                            <option selected value="user">User</option>
                                                            <option value="project_viewer">Project Viewer</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Project</label>
                                                        <select class="form-control select2" name="project_id" multiple="">
                                                            <option selected disabled>Select Project</option>
                                                            @foreach ($project as $p)
                                                            <option value="{{ $p['project_id'] }}">{{ $p['project_name'] }}</option>                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                            
                                                    <div class="modal-footer bg-whitesmoke br">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                            </form>
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
@endsection
@push('script')
    <script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
@endpush
