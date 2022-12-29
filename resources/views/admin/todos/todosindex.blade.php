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
                        <div class="card card-bordered card-preview p-3">
                            <div class="card-inner">
                                <h3>To-Dos</h3>
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                            data-bs-target="#todos">Add a To-do</button>
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
                                                    <th>User</th>
                                                    <th>Project</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($todo as $t)
                                                <tr>
                                                    <td>
                                                        <div class="sort-handler text-center">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td>{{ $t['task'] }}</td>
                                                    <td>{{ $t['user_id'] }}</td>
                                                    <td>{{ $t['project_id'] }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class=" dropdown-toggle" href="#"
                                                                data-bs-toggle="dropdown">Action </a>
                                                            <div class="dropdown-menu">
                                                                <ul class="link-list-opt">
                                                                    <li><button type="button" class="dropdown-item"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edittodos{{ $t['todos_id'] }}">Edit
                                                                            Project</button>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('task.delete', $t['todos_id']) }}"
                                                                            method="POST">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="dropdown-item">Delete
                                                                                To-dos</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- edit modal --}}
                                                <div class="modal fade" tabindex="-1" id="edittodos{{ $t['todos_id'] }}">
                                                    <div class="modal-dialog modal-dialog-top" role="document">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Task</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('task.update', $t['todos_id']) }}"
                                                                    method="POST">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Name *</label>
                                                                            <input type="text"
                                                                                value="{{ $t['task'] }}"
                                                                                id="task-name" name="task"
                                                                                class="form-control" >
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label">ASSIGNEE*</label>
                                                                            
                                                                            <div class="form-control-wrap">
                                                                                <select class="form-select js-select2" name="user_id">
                                                                                    <option value=" " selected disabled>Select Assigne
                                                                                    </option>
                                                                                    @foreach ($member as $m)
                                                                                    <option {{ $m['user_id'] == $t['user_id'] ? 'selected' : '' }} value="{{ $m['user_id'] }}">
                                                                                        {{ $m['name'] }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label">Project*</label>
                                                                            <div class="form-control-wrap">
                                                                                <select class="form-select js-select2" name="project_id">
                                                                                    <option value=" " selected disabled>Select Project
                                                                                    </option>
                                                                                    @foreach ($project as $p)
                                                                                    <option {{ $p['project_id'] == $t['project_id'] ? 'selected' : '' }} value="{{ $p['project_id'] }}">
                                                                                        {{ $p['project_name'] }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
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
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- modal add todo --}}
                                <div class="modal fade" tabindex="-1" id="todos">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">New To-do</h5>
                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('task.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-01">TO-DO*</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="task"
                                                                id="default-01" placeholder="Input To-do">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Project*</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2" name="project_id">
                                                                <option value=" " selected disabled>Select Project
                                                                </option>
                                                                @foreach ($project as $p)
                                                                <option value="{{ $p['project_id'] }}">
                                                                    {{ $p['project_name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">ASSIGNEE*</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2" name="user_id">
                                                                <option value=" " selected disabled>Select Assigne
                                                                </option>
                                                                @foreach ($member as $m)
                                                                <option value="{{ $m['user_id'] }}">
                                                                    {{ $m['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="modal-footer bg-light">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                    aria-label="Close">Close</button>
                                                <button class="btn btn-success">Submit</button>
                                            </div>
                                            </form>
                                        </div>
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
