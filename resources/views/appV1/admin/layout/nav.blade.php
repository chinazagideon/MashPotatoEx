@extends('appV1.admin.layout.app')
@section('sidebar')
    <div class="menu-mobile menu-activated-on-click ">
        <div class="mm-logo-buttons-w"><a class="mm-logo"  href="/"><img src="{{asset('appV1/assets/img/misc/logo-ave-2.png')}}" alt="{{config('app.name')}}" style="width: 60%;">
                {{--                <span>{{config('app.name')}}</span>--}}
            </a>
            <div class="mm-buttons">
                <div class="content-panel-open">
                    <div class="os-icon os-icon-grid-circles"></div>
                </div>
                <div class="mobile-menu-trigger">
                    <div class="os-icon os-icon-hamburger-menu-1"></div>
                </div>
            </div>
        </div>
        <div class="menu-and-user">
            <div class="logged-user-w">
                <div class="avatar-w">{{--<img alt="" src="{{asset('dashboard/v2/img/avatar1.jpg')}}">--}}</div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">{!! Auth::user()->name .'&nbsp;'. Auth::user()->lname !!}</div>
                    @if(Auth::user()->is_admin)
                        <div class="logged-user-role">Administrator</div>
                    @endif
                </div>
            </div>
            <ul class="main-menu">
                    <li class="sub-header"><span>Account</span></li>
                    <li class="selected"><a href="{{route('admin.manage_users')}}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-plus-circle"></div>
                            </div>
                            <span>User Managements</span></a>

                    </li>


                    <li class="sub-header"><span>Fund</span></li>
                    <li class="selected"><a href="{{route('admin.wallets')}}">
                            <div class="icon-w">
                               <div class="os-icon os-icon-dollar-sign"></div>
                           </div>
                           <span>Manage Wallets</span></a>

                    </li>



                    <li class="selected"><a href="{{route('admin.lend')}}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-bar-chart-stats-up"></div>
                            </div>
                            <span>Borrow Application</span></a>

                    </li>
                    <li class="selected"><a href="{{route('admin.swap')}}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-bar-chart-stats-up"></div>
                            </div>
                            <span>Swap List</span></a>

                    </li>
                    <li class="selected"><a href="{{route('admin.stake')}}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-dollar-sign"></div>
                            </div>
                            <span>Staking</span></a>

                    </li>
                    <li class="selected"><a href="{{route('admin.mine')}}">
                            <div class="icon-w">
                                <div class="os-icon os-icon-wallet-loaded"></div>
                            </div>
                            <span>Mining </span></a>

                    </li>
                    <li class="selected"><a href="{{route('admin.mining_upload')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-wallet-loaded"></div>
                    </div>
                    <span>Upload Mining </span></a>

            </li>

                <li class="selected"><a href="{{route('admin.presale_orders')}}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-wallet-loaded"></div>
                        </div>
                        <span>Presale Orders </span></a>

                </li>
                    <li class="sub-header"><span>Investment</span></li>

                    <li class="selected"><a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-share"></div>
                            </div>
                            <span>Messages</span></a>

                    </li>
                    <li class="selected"><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <div class="icon-w">
                                <div class="os-icon os-icon-cancel-circle"></div>
                            </div>
                            <span>Logout</span></a>

                    </li>
            </ul>
        </div>
    </div>
    <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
        <div style="" class="logo-w"><a class="logo" href="/">
                <img src="{{asset('appV1/assets/img/misc/logo-ave-1.png')}}" style="width: 100%" alt="logo">
                {{--                <div class="logo-label">{{config('app.name')}}</div>--}}
            </a></div>
        <div class="logged-user-w avatar-inline">
            <div class="logged-user-i">
                <div class="avatar-w">{{--<img alt="" src="{{asset('dashboard/v2/img/avatar1.jpg')}}">--}}</div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">{{Auth::user()->name}}</div>
                    @if(Auth::user()->is_admin)
                        <div class="logged-user-role">Administrator</div>
                    @endif
                </div>
                <div class="logged-user-toggler-arrow">
                    <div class="os-icon os-icon-chevron-down"></div>
                </div>
                <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                        <div class="avatar-w">{{--<img alt="" src="{{asset('dashboard/v2/img/avatar1.jpg')}}">--}}</div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">{{Auth::user()->name}}</div>
                            @if(Auth::user()->is_admin)
                                <div class="logged-user-role">Administrator</div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                    <ul>

                        <li><a href="#"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Settings</span></a>
                        </li>
                        <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Account Activity</span></a></li>
                        <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="os-icon os-icon-signs-11"></i>
                                {{ __('Logout') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <h1 class="menu-page-header">Page Header</h1>
        <ul class="main-menu">
            <li class="sub-header"><span>Account</span></li>
            <li class="selected"><a href="{{route('admin.manage_users')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-plus-circle"></div>
                    </div>
                    <span>User Managements</span></a>

            </li>


            <li class="sub-header"><span>Fund</span></li>
           <li class="selected"><a href="{{route('admin.wallets')}}">
                   <div class="icon-w">
                        <div class="os-icon os-icon-dollar-sign"></div>
                   </div>
                   <span>Manage Wallets</span></a>

           </li>

            <li class="selected"><a href="{{route('admin.withdraw')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-download-cloud"></div>
                    </div>
                    <span>Withdraw Funds</span></a>

            </li>

            <li class="selected"><a href="{{route('admin.lend')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-bar-chart-stats-up"></div>
                    </div>
                    <span>Borrow Application</span></a>

            </li>
            <li class="selected"><a href="{{route('admin.swap')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-bar-chart-stats-up"></div>
                    </div>
                    <span>Swap List</span></a>

            </li>
            <li class="selected"><a href="{{route('admin.stake')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-dollar-sign"></div>
                    </div>
                    <span>Staking</span></a>

            </li>
            <li class="selected"><a href="{{route('admin.mine')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-wallet-loaded"></div>
                    </div>
                    <span>Mining </span></a>

            </li>
            <li class="selected"><a href="{{route('admin.mining_upload')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-wallet-loaded"></div>
                    </div>
                    <span>Upload Mining </span></a>

            </li>
            <li class="selected"><a href="{{route('admin.presale_orders')}}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-wallet-loaded"></div>
                    </div>
                    <span>Presale Orders </span></a>

            </li>
            <li class="sub-header"><span>Investment</span></li>

            <li class="selected"><a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-share"></div>
                    </div>
                    <span>Messages</span></a>

            </li>
            <li class="selected"><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <div class="icon-w">
                        <div class="os-icon os-icon-cancel-circle"></div>
                    </div>
                    <span>Logout</span></a>

            </li>



        </ul>

    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

