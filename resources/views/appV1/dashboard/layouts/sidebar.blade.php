@extends('appV1.dashboard.layouts.nav')

@section('sidebar')

    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a href="/" class="logo">
{{--                    <span>--}}
{{--                        <img src="{{asset('appV1/assets/img/misc/logo-ave-1.png')}}" alt="logo-small" class="logo-sm">--}}
{{--                    </span>--}}
                <span>
                        <img src="{{asset('appV1/assets/img/misc/logo-ave-1.png')}}" alt="logo-large"
                             class=" logo-light">
                      {{--  <img src="{{asset('appV1/assets/img/misc/logo-ave-2.png')}}" alt="logo-large"
                             class=" logo-dark">--}}
                    </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Main</li>
                <li>
                    <a href="{{route('dashboard')}}"> <i data-feather="home"
                                                       class="align-self-center menu-icon"></i><span>Dashboard</span></a>

                </li>
                <li>
                    <a href="javascript: void(0);"> <i data-feather="user"
                                                       class="align-self-center menu-icon"></i><span>My Account</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li class="nav-item"><a class="nav-link" href="{{route('account')}}"><i class="ti-control-record"></i>Update Profile</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('2fa')}}"><i
                                    class="ti-control-record"></i>Account Security</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('upload_page')}}"><i
                                    class="ti-control-record"></i>Account Verification</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('password')}}"><i
                                    class="ti-control-record"></i>Change Password</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Wallet</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li class="nav-item"><a class="nav-link" href="{{route('view_wallet')}}"><i
                                    class="ti-control-record"></i>My Wallet</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('wallet_history')}}"><i
                                    class="ti-control-record"></i>Wallet History</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('import')}}"><i
                                    class="ti-control-record"></i>Import Wallet</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="{{route('accelerator')}}"><i--}}
{{--                                    class="ti-control-record"></i>Accelerator</a></li>--}}
                        <li class="nav-item"><a class="nav-link" href="{{route('backup')}}"><i
                                    class="ti-control-record"></i>Backup Wallet</a></li>

                    </ul>
                </li>
{{--                <li>--}}
{{--                    <a href="javascript: void(0);"><i data-feather="figma" class="align-self-center menu-icon"></i><span>Token Sales</span><span--}}
{{--                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li class="nav-item"><a class="nav-link" href="{{route('sales')}}"><i--}}
{{--                                    class="ti-control-record"></i>Token Sale</a></li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="{{route('fiat_wallet')}}"><i--}}
{{--                                    class="ti-control-record"></i>Token Wallet</a></li>--}}


{{--                    </ul>--}}
{{--                </li>--}}
                <li>
                    <a href="{{route('swap')}}"><i data-feather="aperture"
                                                      class="align-self-center menu-icon"></i><span>Swap</span></a>

                </li>

                <li>
                    <a href="javascript: void(0);"><i data-feather="shopping-cart"
                                                      class="align-self-center menu-icon"></i><span>Asset</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{route('staking')}}"><i
                                    class="ti-control-record"></i>Staking</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('staked_coins')}}"><i
                                    class="ti-control-record"></i>Stake List</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{route('sales')}}"><i
                                    class="ti-control-record"></i>Upcoming Sales</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('presale_order')}}"><i
                                    class="ti-control-record"></i>Pre-sale Orders</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);"><i data-feather="target"
                                                      class="align-self-center menu-icon"></i><span>Loan</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{route('borrow')}}"><i
                                    class="ti-control-record"></i>Borrow</a></li>


                    </ul>
                </li>
                <li>
                    <a href="{{route('referral')}}"><i data-feather="users"
                                                   class="align-self-center menu-icon"></i><span>Referral</span></a>

                </li>
                <li>
                    <a href="{{route('trader')}}"><i data-feather="users"
                                                       class="align-self-center menu-icon"></i><span>Bot Trader</span></a>

                </li>
            {{--    <li>
                    <a href="{{route('fiat_wallet')}}"><i data-feather="activity"
                                                       class="align-self-center menu-icon"></i><span>Other wallet balance</span></a>

                </li>--}}
                <li>
                    <a href="{{route('transactions')}}"><i data-feather="list"
                                                       class="align-self-center menu-icon"></i><span>Transaction History</span></a>

                </li>

                <li>
                    <a href="javascript: void(0);"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Authentication</span><span
                            class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="ti-control-record"></i>Log out</a></li>
                    </ul>
                </li>
                 @if(Auth::user()->is_admin)
                    <li>
                        <a href="{{route('admin.manage_users')}}">
                            <i data-feather="home" class="align-self-center menu-icon"></i>
                            <span>View Admin</span>
                        </a>

                    </li>
                    @endif


                <hr class="hr-dashed hr-menu">

            </ul>

            <footer class="footer text-center text-sm-left " style="position:static;margin-top: 170px; border-top: 1px solid #163765 !important;">
               @php
               $date = \Carbon\Carbon::now();
               @endphp
                <h5>&copy; {{$date->year}} {{config('app.name')}}</h5> <br/>
                <a href="{{route('jobs')}}" class="ft-m">Jobs</a> |
{{--                <a href="{{route('help')}}" class="ft-left-m ft-m">Help</a> |--}}
                <a href="{{route('privacy')}}" class="ft-left-m ft-m">Privacy</a> |
                <a  href="{{asset('appV1/assets/documents/PennHaven_Terms_and_Conditions.pdf')}}" target="_blank" class="ft-left-m ft-m">Terms</a> |
                <a href="{{route('legal')}}" class="ft-left-m ft-m">Legal</a> |
                <a href="{{route('status')}}" class="ft-left-m ft-m">Status</a> |
                <a target="_blank" href="https://brokercheck.finra.org/firm/summary/309708" class="ft-left-m ft-m">Broker Check</a> |
                <a href="{{route('blog')}}" class="ft-left-m ft-m">Blog</a>
            </footer><!--end footer-->
        </div>
    </div>
    <!-- end left-sidenav-->


@endsection
@section('page_css')
    <style>
        .footer a {color: #a6a6a6 !important;}
    </style>

@endsection
