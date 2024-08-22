<div class="nk-header is-light nk-header-fixed is-light">
    <div class="container-xl wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1 me-3">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{ route('home') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{asset('logo.png')}}" alt="logo">
                    <img class="logo-dark logo-img" src="{{asset('logo.png')}}" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-menu is-light">
                <div class="nk-header-menu-inner">
                    <!-- Menu -->
                    <ul class="nk-menu nk-menu-main">
                        <li class="nk-menu-item">
                            <a href="{{route('home')}}" class="nk-menu-link">
                                <i class="ni ni-home-fill"></i>
                                <span class="nk-menu-text">Home</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    </ul>
                    <!-- Menu -->
                </div>
            </div><!-- .nk-header-menu -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                            <div class="quick-icon border border-light">
                                @if (session('locale') == 'en')
                                    <img class='icon' src="{!! asset('assets/images/lang/gb.png') !!}" alt="fr">

                                @else
                                    <img class="icon" src="{!! asset('assets/images/lang/fr.png') !!}" alt="fr">
                                @endif
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="language-list">
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="{!! asset('assets/images/lang/gb.png') !!}" alt="" class="language-flag">
                                        <span class="language-name">English</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="language-item">
                                        <img src="{!! asset('assets/images/lang/fr.png') !!}" alt="" class="language-flag">
                                        <span class="language-name">Français</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li><!-- .dropdown -->
                    @if(!auth()->check())
                    <li>
                        <a href="{{route('login')}}" class="btn btn-primary">
                            <i class="fa fa-sign"></i>
                            <span class="">Login</span>
                        </a>
                    </li>
                    @else
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{auth()->user()->name}}</span>
                                        <span class="sub-text">{{auth()->user()->phone}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="#"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                  <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{route('destroy')}}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endif
                </ul>
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
