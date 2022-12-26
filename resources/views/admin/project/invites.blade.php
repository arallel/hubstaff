@extends('layouts.app')

@section('title', 'Members')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')<div class="main-content">

        {{--      <div class="section-header d-flex">
               
            </div> --}}

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <h5>Invites</h5>
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab3" href="{{ url('members') }}">Members(#)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('invites') }}">Invites(#)</a>
                        </li>
                    </ul>
                    <div class="my-2">
                        <div class="d-flex justify-content-between">
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="250">
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                    <div class="search-backdrop"></div>
                                </div>
                            </form>
                            <div>
                                <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" class="btn btn-icon icon-left"><i
                                        class="fa-solid fa-download mr-2"></i>Default</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">To CSV</a>
                                </div>
                            </div>
                            <div class="ml-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Invite
                                    Member</button>
                            </div>
                            
                            
                            <div class="ml-2">
                                <a href="#" class="btn btn-outline-primary" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</a>
                                <div class="dropdown-menu">
                                    <div class="m-3">
                                        <label>Time Tracking</label>
                                        <select class="selectric">
                                            <option>All</option>
                                            <option>Enable</option>
                                            <option>Disable</option>
                                        </select>
    
                                        <label>Role</label>
                                        <select class="selectric">
                                            <option>All Roles</option>
                                            <option>Organization Owner</option>
                                            <option>Organization Manager</option>
                                            <option>Project Manager</option>
                                            <option>User</option>
                                            <option>Project Viewer</option>
                                            <option>Multiple Project Roles</option>
                                            <option>No Role</option>
                                        </select>
                                      
                                        <label>Member</label>
                                        <select class="selectric">
                                            <option>All Member</option>
                                            <option>Active Only</option>
                                            <option>Remove Only</option>
                                        </select>
                                      
                                        <button class="btn">Clear Filter</button>
                                        <button class="btn btn-primary">Apply Filter</button>
                                    </div>

                                    {{-- <a class="dropdown-item"
                                            href="#">Action</a>
                                        <a class="dropdown-item"
                                            href="#">Another action</a>
                                        <a class="dropdown-item"
                                            href="#">Something else here</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table-striped table-sm w-100">
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Member</th>
                                   
                                    <th>Role</th>
                                    <th>Teams</th>
                                    <th>Payment</th>
                                    <th>Limits</th>
                                   
                                    <th></th>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Shin Kisagi</td>
                                   
                                    <td>
                                        Organization Owner
                                    <td>None</td>
                                    <td>
                                        <a href="">No pay rate / bill rate</a>
                                    </td>
                                    <td>no weekly limit <br> no daily limit</td>
                                    
                                    <td>
                                        <a href="#" class="btn btn-icon icon-left" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit info</a>
                                            <a class="dropdown-item" href="#">Edit Role and Membership</a>
                                            <a class="dropdown-item" href="#">Edit Payment Detail</a>
                                            <a class="dropdown-item" href="#">Edit Limit</a>
                                            
                                            <a class="dropdown-item" href="#">Remove Member</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="checkbox-2">
                                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>Shin Kisagi</td>
                                   
                                    </td>
                                    <td>
                                        Organization Owner
                                    <td>None</td>
                                    <td>
                                        <a href="">No pay rate / bill rate</a>
                                    </td>
                                    <td>no weekly limit <br> no daily limit</td>
                                   
                                    <td>
                                        <a href="#" class="btn btn-icon icon-left" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit info</a>
                                            <a class="dropdown-item" href="#">Edit Role and Membership</a>
                                            <a class="dropdown-item" href="#">Edit Payment Detail</a>
                                            <a class="dropdown-item" href="#">Edit Limit</a>
                                            
                                            <a class="dropdown-item" href="#">Remove Member</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
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
                    <form action="" method="post" enctype="multipart/form-data">
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
                                                <input name="pay[]" id="pay1" type="text"
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
                                <select class="form-control selectric">
                                    <option>Organization Manager</option>
                                    <option>Project Manager</option>
                                    <option selected>User</option>
                                    <option>Project Viewer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Project</label>
                                <select class="form-control select2" multiple="">
                                    <option>Project 1</option>
                                    <option>Project 1</option>
                                    <option>Project 1</option>

                                </select>
                            </div>

                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <!-- JS Libraies -->
        <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
        <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
        <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

        <!-- Page Specific JS File -->
        <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
        <script src="{{ asset('js/page/components-table.js') }}"></script>
    @endpush
