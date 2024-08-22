@if(auth()->check())
<div class="nk-sidebar is-light nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('home') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('assets/images/Logo.png')}}" srcset="{{asset('assets/images/Logo.png')}} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('assets/images/Logo.png')}}" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{asset('assets/images/Logo.png')}}" srcset="{{asset('assets/images/Logo.png')}} 2x" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag"></em></span>
                            <span class="nk-menu-text">Home</span><span class="nk-menu-badge"></span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('mygame') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-master-card"></em></span>
                            <span class="nk-menu-text">Mes jeux</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('withdraw') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-out"></em></span>
                            <span class="nk-menu-text">Retrait</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Settings</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('bonus') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
                            <span class="nk-menu-text">Bonus</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('settings') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">Settings</span>
                        </a>
                    </li>
                    @if(auth()->user()->user_type==0)
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Games</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('lotto_fixture_list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-presentation"></em></span>
                            <span class="nk-menu-text">Jeux</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('configuration') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-play"></em></span>
                            <span class="nk-menu-text">Resultats</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Configuration</h6>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('configuration') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Configuration</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('transaction') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-cc-alt2"></em></span>
                            <span class="nk-menu-text">Transactions</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('lotto_fixture_list') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span>
                            <span class="nk-menu-text">Fixtures</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    @endif
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
@endif
