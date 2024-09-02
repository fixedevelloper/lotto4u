@extends('layout')
@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Security Information</h4>
                                            <div class="nk-block-des">
                                                <p>Changer votre mot de passe.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <form method="POST">
                                        <input name="id" value="{{auth()->id()}}" hidden>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="default-01">New password</label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control form-control-lg" id="default-01" name="newpassword" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="default-01">Old Password</label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control form-control-lg" id="default-01" name="oldpassword" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-lg btn-primary btn-block">Update</button>
                                        </div>
                                        @csrf
                                    </form>
                                </div><!-- .nk-block -->
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar bg-primary">
                                                <span>AB</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{auth()->user()->name}}</span>
                                                <span class="sub-text">{{auth()->user()->phone}}</span>
                                            </div>
                                            <div class="user-action">
                                                <div class="dropdown">
                                                    <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .user-card -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="user-account-info py-0">
                                            <h6 class="overline-title-alt">Wallet Account</h6>
                                            <div class="user-balance">{{auth()->user()->sold}} <small class="currency currency-btc">FCFA</small></div>
                                            <div class="user-balance-sub">Locked <span>0.0 <span class="currency currency-btc">FCFA</span></span></div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a href="{{route('identity')}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                            <li><a class="active" href="{{route('security')}}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                            <li><a href="{{route('parrainnage')}}"><em class="icon ni ni-grid-add-fill-c"></em><span>Parainages</span></a></li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
