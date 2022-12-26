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
        <section class="section">
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
                                                    <th>Description</th>
                                                    <th>Budget</th>
                                                    <th>Members</th>
                                                    <th>Trackable by me</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td>Create a mobile app</td>
                                                    <td></td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="100%">
                                                            <div class="progress-bar bg-success" data-width="100"></div>
                                                        </div>
                                                        <button class="btn" data-toggle="modal" data-target="#editBudget">Edit Budget</button>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Wildan Ahdian">
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
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProject">Edit Project</a>
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editBudget">Edit Budget</a>
                                                            <a class="dropdown-item" href="#">Archive Project</a>
                                                            <a class="dropdown-item" href="#">Duplicate Project</a>
                                                            <a class="dropdown-item" href="#">Delete Project</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td>Redesign homepage</td>
                                                    <td></td>
                                                    <td class="align-middle">

                                                        <h6 class="w--100">budget: none</h6>
                                                        <button class="btn" data-toggle="modal" data-target="#editBudget">Edit Budget</button>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Nur Alpiana">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-3.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Hariono Yusup">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-4.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Bagus Dwi Cahya">
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <div class="badge badge-success">active</div>
                                                    </td>
                                                    <td><button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editProject">Edit Project</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editBudget">Edit Budget</a>
                                                            <a class="dropdown-item" href="#">Archive Project</a>
                                                            <a class="dropdown-item" href="#">Duplicate Project</a>
                                                            <a class="dropdown-item" href="#">Delete Project</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td>Backup database</td>
                                                    <td></td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="70%">
                                                            <div class="progress-bar bg-warning" data-width="70"></div>
                                                        </div>
                                                        <button class="btn" data-toggle="modal" data-target="#editBudget">Edit Budget</button>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Rizal Fakhri">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-2.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Hasan Basri">
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <div class="badge badge-success">active</div>
                                                    </td>
                                                    <td><button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editProject">Edit Project</a>
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editBudget">Edit Budget</a>
                                                            <a class="dropdown-item" href="#">Archive Project</a>
                                                            <a class="dropdown-item" href="#">Duplicate Project</a>
                                                            <a class="dropdown-item" href="#">Delete Project</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="sort-handler">
                                                            <i class="fas fa-th"></i>
                                                        </div>
                                                    </td>
                                                    <td>Input data</td>
                                                    <td></td>
                                                    <td class="align-middle">
                                                        <div class="progress" data-height="4" data-toggle="tooltip"
                                                            title="100%">
                                                            <div class="progress-bar bg-success" data-width="100"></div>
                                                        </div>
                                                        <button class="btn" data-toggle="modal" data-target="#editBudget">Edit Budget</button>
                                                    </td>
                                                    <td>
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-2.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Rizal Fakhri">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Isnap Kiswandi">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-4.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Yudi Nawawi">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Khaerul Anwar">
                                                    </td>
                                                    <td><i class="fa-regular fa-circle-check"></i></td>
                                                    <td>
                                                        <div class="badge badge-danger">Canceled</div>
                                                    </td>
                                                    <td><button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editProject">Edit Project</a>
                                                            <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#editBudget">Edit Budget</a>
                                                            <a class="dropdown-item" href="#">Archive Project</a>
                                                            <a class="dropdown-item" href="#">Duplicate Project</a>
                                                            <a class="dropdown-item" href="#">Delete Project</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Modal edit budget --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="editBudget">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Project Budget</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Type *</label>
                                        <select id="client" name="client" class="form-control selectric">
                                            <option>Total Cost</option>
                                            <option>Total Hour</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Based on *</label>
                                        <select id="client" name="client" class="form-control selectric">
                                            <option>Bill Rate</option>
                                            <option>Pay Rate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Currency</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    $
                                                </div>
                                            </div>
                                            <input type="text"
                                                class="form-control currency">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-8">                              
                                    <div class="form-group">
                                        <label>Date Picker</label>
                                        <input type="text"
                                            class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">                              
                                    <div class="form-group">
                                        <label>Notify at</label>
                                        <input type="number"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{-- Update Modal --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="editProject">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Organization</label>
                                <input readonly type="text" class="form-control" value="Mekakushi Gng.">
                            </div>
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" id="project-name" name="project-name" class="form-control"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label>Client</label>
                                <select id="client" name="client" class="form-control selectric">
                                    <option>City Bussiness</option>
                                    <option>AOmega Eye</option>
                                    <option>StripSk</option>
                                </select>
                            </div>
                            <h3>Team</h3>
                            <div class="form-group">
                                <h6>Manager</h6>
                                <label>Oversees and manage project</label>
                                <select id="edit-manager" name="edit-manager" class="form-control select2" multiple="">
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
                                <select id="edit-user" name="edit-user" class="form-control select2" multiple="">
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
                                <select id="edit-view" name="edit-view" class="form-control select2" multiple="">
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
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Organization</label>
                                <input readonly type="text" class="form-control" value="Mekakushi Gng.">
                            </div>
                            <div class="form-group">
                                <label>Name *</label>
                                <input type="text" id="project-name" name="project-name" class="form-control"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label>Client</label>
                                <select id="client" name="client" class="form-control selectric">
                                    <option>City Bussiness</option>
                                    <option>AOmega Eye</option>
                                    <option>StripSk</option>
                                </select>
                            </div>
                            <h3>Team</h3>
                            <div class="form-group">
                                <h6>Manager</h6>
                                <label>Oversees and manage project</label>
                                <select id="managers" name="managers" class="form-control select2" multiple="">
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
                                <select id="users" name="users" class="form-control select2" multiple="">
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
                                <select id="viewe" name="viewe" class="form-control select2" multiple="">
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
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
