@extends('layouts.auth')
@section('content')
    <!-- content @s
        -->
        <div class="nk-content ">
            <div class="nk-split nk-split-page nk-split-lg">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                        <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em
                                class="icon ni ni-info"></em></a>
                    </div>
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <div class="brand-logo pb-5">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="./images/logo.png"
                                    srcset="./images/logo2x.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png"
                                    srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Register</h5>
                                <div class="nk-block-des">
                                    <p>Create New Dashlite Account</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="company" value="{{ $data->company }}" disabled class="form-control form-control-lg" id="name"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name"  class="form-control form-control-lg" id="email"
                                        placeholder="Enter your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <div class="form-control-wrap">
                                    <input type="email" name="email" value="{{ $data->email }}" class="form-control form-control-lg" id="email"
                                        placeholder="Enter your email address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Passcode</label>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                        data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input type="password" name="password" class="form-control form-control-lg" id="password"
                                        placeholder="Enter your passcode">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-control-xs custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox">
                                    <label class="custom-control-label" for="checkbox">I agree to Dashlite <a tabindex="-1"
                                            href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#">
                                            Terms.</a></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block">Register</button>
                            </div>
                        </form><!-- form -->
                        <div class="form-note-s2 pt-4"> Already have an account ? <a
                                href="html/pages/auths/auth-login.html"><strong>Sign in instead</strong></a>
                        </div>
                        <div class="text-center pt-4 pb-3">
                            <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                        </div>
                        <ul class="nav justify-center gx-8">
                            <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                        </ul>
                    </div><!-- .nk-block -->

                </div><!-- nk-split-content -->
                <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                    data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                        <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src="{{ asset('images/slides/promo-a.png') }}"
                                            srcset="./images/slides/promo-a2x.png 2x" alt="">
                                    </div>
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>Dashlite</h4>
                                        <p>You can start to create your products easily with its user-friendly design & most
                                            completed responsive layout.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src=".{{ asset('images/slides/promo-b.png') }}"
                                            srcset="./images/slides/promo-b2x.png 2x" alt="">
                                    </div>
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>Dashlite</h4>
                                        <p>You can start to create your products easily with its user-friendly design & most
                                            completed responsive layout.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                            <div class="slider-item">
                                <div class="nk-feature nk-feature-center">
                                    <div class="nk-feature-img">
                                        <img class="round" src="{{ asset('images/slides/promo-c.png') }}"
                                            srcset="./images/slides/promo-c2x.png 2x" alt="">
                                    </div>
                                    <div class="nk-feature-content py-4 p-sm-5">
                                        <h4>Dashlite</h4>
                                        <p>You can start to create your products easily with its user-friendly design & most
                                            completed responsive layout.</p>
                                    </div>
                                </div>
                            </div><!-- .slider-item -->
                        </div><!-- .slider-init -->
                        <div class="slider-dots"></div>
                        <div class="slider-arrows"></div>
                    </div><!-- .slider-wrap -->
                </div><!-- nk-split-content -->
            </div><!-- nk-split -->
        </div>
        <!-- wrap @e -->
        </div>
        <!-- content @e -->
    @endsection
