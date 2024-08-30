@extends('appV1.dashboard.layouts.app')
@section('page_title', '')
@section('header')
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown"
                       href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i data-feather="bell" class="align-self-center topbar-icon"></i>
                        <span class="badge badge-danger badge-pill noti-icon-badge">{{notify(Auth::user()->id)->count()}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">

                        <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                            Notifications <span class="badge badge-primary badge-pill">{{notify(Auth::user()->id)->count()}}</span>
                        </h6>
                        <div class="notification-menu" data-simplebar>

                            @foreach(notify(Auth::user()->id) as $alert)
                            <!-- item-->
                            @if($alert->comment =="token_stake")
                                    <a href="{{route('transactions')}}" class="dropdown-item py-3">
                                        <small class="float-right text-muted pl-2">{{$alert->created_at->diffForHumans()}}</small>
                                        <div class="media">
                                            <div class="avatar-md bg-soft-primary">
                                                <i data-feather="bell" class="align-self-center icon-xs"></i>
                                            </div>
                                            <div class="media-body align-self-center ml-2 text-truncate">
                                                <h6 class="my-0 font-weight-normal text-dark">{{formatNotifyCaption($alert->type)}}</h6>
                                                <small class="text-muted mb-0">Coin Staking Completed</small>
                                            </div><!--end media-body-->
                                        </div><!--end media-->
                                    </a><!--end-item-->
                                    <!-- item-->
                            @else
                            <a href="{{route('transactions')}}" class="dropdown-item py-3">
                                <small class="float-right text-muted pl-2">{{$alert->created_at->diffForHumans()}}</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i data-feather="bell" class="align-self-center icon-xs"></i>
                                    </div>
                                    <div class="media-body align-self-center ml-2 text-truncate">
                                        <h6 class="my-0 font-weight-normal text-dark">{{formatNotifyCaption($alert->type)}}</h6>
                                        <small class="text-muted mb-0">{{formatNotify($alert->type, $alert->coin->coin_name,$alert->reference_id)}}</small>
                                    </div><!--end media-body-->
                                </div><!--end media-->
                            </a><!--end-item-->
                            <!-- item-->
                                @endif
                                @endforeach


                        </div>
                        <!-- All-->
                        <a href="{{route('transactions')}}" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                       href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <span class="ml-1 nav-user-name hidden-sm">{!! Auth::user()->fname. ' '.Auth::user()->lname. " <small> (" . strtoupper(Auth::user()->member_id) .")</small>"!!}</span>
                        <div class="avatar-md bg-soft-primary">
                            <i data-feather="user" class="align-self-center icon-xs"></i>
                        </div>
{{--                        <img src="{{asset('appV1/dashb/assets/images/users/user-5.jpg')}}" alt="profile-user" class="rounded-circle thumb-xs"/>--}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('account')}}"><i data-feather="user"
                                                                       class="align-self-center icon-xs icon-dual mr-1"></i>
                            Profile</a>
                        <a class="dropdown-item" href="{{route('transactions')}}"><i data-feather="list"
                                                                       class="align-self-center icon-xs icon-dual mr-1"></i>
                            My Transactions</a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i data-feather="power"
                                                                       class="align-self-center icon-xs icon-dual mr-1"></i>
                            Logout</a>
                    </div>
                </li>
            </ul><!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile">
                        <i data-feather="menu" class="align-self-center topbar-icon"></i>
                    </button>
                </li>
                <li class="">
                    <div class="nav-link">
                        <button class="btn btn-sm btn-soft-secondary" type="button" data-toggle="modal" data-target="#exampleModalCoin" id="send_btn"  href="#" role="button"><i
                                class="fas fa-upload mr-2"></i>Withdraw</button>
                        <button class="btn btn-sm btn-soft-primary" type="button" id="receive_btn" data-toggle="modal" data-target="#exampleModalCoin" role="button"><i
                                class="fas fa-download mr-2 receive_btn"></i>Deposit</button>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

@endsection
