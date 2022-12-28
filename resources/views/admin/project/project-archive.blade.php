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
                                    <h2>Project Archive</h2>
                                    <ul class="nav nav-pills mt-2">
                                        <li class="nav-item">
                                            <a class="ml-2 nav-link " id="home-tab3"
                                                href="{{ route('project.index') }}">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active bg-primary" href="{{ route('project.archive') }}">Archived ({{count($data)}})</a>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-3 mt-5">
                                            <input type="text" class="form-control rounded-pill"
                                                placeholder="Search projects" name="" id="">
                                        </div>
                                        <div class="col-9 mt-5 text-end">
                                          
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
                                                <th>Project Name</th>
                                                <th>Teams</th>
                                                <th>members</th>
                                                <th>to do</th>
                                                <th>Budget</th>
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
                                                        @if ($d['user_id'] == !null)
                                                        {{ $d['user_id'] }}
                                                        @else
                                                            None
                                                        @endif</td>
                                                    <td class="align-middle">
                                                        None
                                                        {{-- @if ($d['todos'] == !null)
                                                        {{ $d['todos'] }}
                                                        @else
                                                        @endif --}}
                                                    </td>
                                                    <td>
                                                    <div>@if ($d['budget'] == !null)
                                                        {{ $d['budget']  }}
                                                    @else
                                                        None
                                                    @endif</div>
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
