@extends('appV2.layouts.app')
@section('header')

    <header class="light-bb">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="/"><img src="{{asset('appV1/assets/img/misc/logo-ave-2.png')}}" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
                    aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon ion-md-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="headerMenu">
                <ul class="navbar-nav mr-auto">
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                           aria-expanded="false">--}}
{{--                            Dashboard--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-custom-icon">
                        <a class="nav-link" href="#" id="clickFullscreen">
                            <i class="icon ion-md-expand"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown header-img-icon">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <img src="{{asset('appV2/assets/img/avatar.svg')}}" alt="avatar">
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="{{asset('appV2/assets/img/avatar.svg')}}" alt="">
                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0">{{Auth::user()->fname . ' '. Auth::user()->name}}</p>
                                    <p class="email text-muted mb-3">{{Auth::user()->email}}</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav">
                                    <li class="nav-item">
                                        <a href="{{route('dashboard')}}" class="nav-link">
                                            <i class="icon ion-md-person"></i>
                                            <span>My Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('account')}}" class="nav-link">
                                            <i class="icon ion-md-person"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('view_wallet')}}" class="nav-link">
                                            <i class="icon ion-md-wallet"></i>
                                            <span>My Wallet</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('exchanger')}}" class="nav-link">
                                            <i class="icon ion-md-settings"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link red" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon ion-md-power"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
@endsection


