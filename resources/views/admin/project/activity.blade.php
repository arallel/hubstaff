@extends('layouts.app')
@push('style')
@endpush
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="card card-bordered p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Screenshot</h3>
                            <ul class="nav nav-tabs mt-n3">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#tabItem1">Every 10 Minutes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem2">All screenshot</a>
                                </li>

                            </ul>
                            <div class="d-flex align-items-center">
                                <a href=""><i class="fa-solid fa-gear me-2"></i>Setting</a>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center mt-2">
                                <a href="#" class="btn btn-light me-1"><em class="icon ni ni-chevron-left"></em></a>
                                <a href="#" class="btn btn-light"><em class="icon ni ni-chevron-right"></em></a>
                                <div class="mx-1">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control date-picker">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2">
                                            <option value="default_option" title="member's timezone">Wib</option>
                                            <option value="option_select_name" title="my timezone">Wib</option>
                                            <option value="option_select_name" title="blindfold">Wib</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2">
                                                <option value="default_option">Kazumi Sora</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                        data-bs-toggle="dropdown">
                                        <div class="dot dot-primary"></div>
                                        <em class="icon ni ni-filter-alt"></em>
                                    </a>
                                    <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                        <div class="dropdown-head">
                                            <span class="sub-title dropdown-title">Filter Users</span>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-icon">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dropdown-body dropdown-body-rg">
                                            <div class="row gx-6 gy-3">
                                                <div class="col-6">
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                        <label class="custom-control-label" for="hasBalance"> Have
                                                            Balance</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="hasKYC">
                                                        <label class="custom-control-label" for="hasKYC"> KYC
                                                            Verified</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Role</label>
                                                        <select class="form-select js-select2">
                                                            <option value="any">Any Role</option>
                                                            <option value="investor">Investor</option>
                                                            <option value="seller">Seller</option>
                                                            <option value="buyer">Buyer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Status</label>
                                                        <select class="form-select js-select2">
                                                            <option value="any">Any Status</option>
                                                            <option value="active">Active</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="suspend">Suspend</option>
                                                            <option value="deleted">Deleted</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-secondary">Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-foot between">
                                            <a class="clickable" href="#">Reset Filter</a>
                                            <a href="#">Save Filter</a>
                                        </div>
                                    </div><!-- .filter-wg -->
                                </div><!-- .dropdown -->
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="h4" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="View All Notes"><em class="icon ni ni-edit"></em></a>
                            <a href="#" class="h4" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Download Screenshot"><em class="icon ni ni-download"></em></a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabItem1">
                                <div class="row p-2">
                                    <div class="col-4 outline-b p-2">
                                        <h6>Time</h6>
                                        <div class="d-flex">
                                            <div class="me-5">
                                                <small class="time-2">0:16</small>
                                                <h6 class="text-secondary">Total Work</h6>
                                            </div>
                                            <div>
                                                <small class="time-2 text-success"><em
                                                        class="icon ni ni-arrow-up"></em>0:16</small>
                                                <h6 class="text-secondary">To Prev Day</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 outline-b p-2">
                                        <h6>Activity</h6>
                                        <div class="d-flex">
                                            <div class="me-2">
                                                <small class="time-2 text-warning">50%</small>
                                                <h6 class="text-secondary">Average </h6>
                                            </div>
                                            <div class="me-2">
                                                <small class="time-2">-</small>
                                                <h6 class="text-secondary">To Prev Day</h6>
                                            </div>
                                            <div>
                                                <small class="time-2">-</small>
                                                <h6 class="text-secondary">To ORG Ave</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 outline-b p-2">
                                        <h6>To-Dos</h6>
                                        <div class="d-flex">
                                            <div class="me-5">
                                                <small class="time-2">0</small>
                                                <h6 class="text-secondary">Completed</h6>
                                            </div>
                                            <div>
                                                <small class="time-2">=</small>
                                                <h6 class="text-secondary">To Prev Day</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabItem2">
                                <p>Hel</p>
                            </div>

                        </div>
                        <div class="timeline">
                            <h6 class="timeline-head">8:00 pm - 9:00 pm |<span> total time worked: 0:19:38</span> </h6>
                            <ul class="timeline-list">
                                <li class="timeline-item">
                                    <div class="timeline-status bg-primary is-outline"></div>
                                    <div class="timeline-date">13 Nov <em class="icon ni ni-alarm-alt"></em></div>
                                    <div class="timeline-data">
                                        <h6 class="timeline-title">Project Name</h6>
                                        <div class="timeline-des">
                                            <p>nothind to-dos</p>
                                            <div class="card product-card w-20">
                                                <div class="product-thumb">
                                                    <a href="html/product-details.html">
                                                        <img class="card-img-top" src="{{ asset('images/screenshot.jpg') }}" alt="" >
                                                    </a>
                                                    <ul class="product-badges">
                                                        <li><span class="badge bg-success">1 Screen</span></li>
                                                    </ul>
                                                    <ul class="product-actions">
                                                        <li><a href="#"><i class="fa-solid fa-trash"></i></a></li>
                                                        <li><a href="#"><i class="fa-solid fa-image"><i class="fa-solid fa-xmark"></i></i></a></li>
                                                        <li><a href=""><em class="icon ni ni-curve-up-right"></em></a></li>
                                                    </ul>
                                                </div>
                                                <div class="card-inner text-center">
                                                    <ul class="product-tags">
                                                        
                                                        <li><a href="#">Smart Watch</a></li>
                                                    </ul>
                                                 
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" data-progress="25"></div>
                                                    </div>
                                                    <small>25% of 10 minutes</small>
                                                    <small class="time-2">09:30am - 09:40am</small>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.1.1') }}"></script>
@endpush
