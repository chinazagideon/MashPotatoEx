@extends('appV1.admin.layout.nav')
@section('page_title', 'Manage User account: '. $user->fname . ' '. $user->lname)
@section('content')
    <style>
        table {
            color: grey !important;
        }
    </style>
    <div class="content-i">

        <div class="content-box">
            <div class="element-wrapper">
                @if((int) $user->status === \App\User::USER_BLOCKED)
                    <div class="alert alert-danger-shadow alert-danger">
                        <h4>This account is blocked </h4>
                    </div>
                    @endif

                <div class="row pt-2">
                    @foreach($supported_coins as $coin)
                        @php
                            $balance = new \App\Http\Controllers\CoinsBalanceController();
                            $coin_bal = $balance->getUserCoinBalance($user->id, $coin->coin_slug);

                        @endphp
                        <div
                            class="col-md-3 col-sm-12">
                            <a
                                class="element-box el-tablo centered trend-in-corner smaller" href="#">
                                <div class="label">{{$coin->coin_slug}} Wallet</div>
                                <div class="value">
                                    &nbsp;{{round($coin_bal, 4). $coin->coin_slug}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{--@foreach($supported_tokens as $tokens)
                        @php
                            $token = new \App\Http\Controllers\TokenWalletController();
                            $token_balance = $balance->getUserCoinBalance($user->id, $tokens->slug);

                        @endphp
                        <div class="col-md-3 col-sm-12"><a
                                class="element-box el-tablo centered trend-in-corner smaller" href="#">
                                <div class="label">{{$tokens->slug}} Wallet</div>
                                <div class="value">
                                    &nbsp;{{round($token_balance,2). $tokens->slug}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                    --}}

                    <div class="col-md-3 col-sm-12"><a
                            class="element-box el-tablo centered trend-in-corner smaller" href="#">
                            <div class="label">Trade Wallet</div>
                            <div class="value">
                                &nbsp;{{$user->trade_balance > 0 ? number_format($user->trade_balance,2). \App\Trader::TRADE_RETURN_COIN : '0.00'}}
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <div class="element-wrapper">
                            <button class="btn btn-outline-warning btn-md"
                                    data-target="#lockCoinBtn"
                                    data-toggle="modal" type="button">Update Wallet
                            </button>

                            {{--<a href="{{route('admin.change_level', ['user' => $user->id])}}"
                               class="btn {{$user->is_admin ? 'btn-outline-danger':'btn-outline-success'}} btn-md">{{$user->is_admin ? 'Make Admin' : 'Remove admin'}}</a>--}}
                            <a href="{{route('admin.change_status', ['user' => $user->id])}}" class="btn {{(int) $user->status == \App\User::USER_BLOCKED  ? 'btn-outline-success' :'btn-outline-danger'}} btn-sm">{{(int) $user->status == \App\User::USER_BLOCKED ? 'Unblock Account' : 'Block User'}}</a>

                            <button class="btn btn-outline-primary btn-md"
                                    data-target="#receivedCoin"
                                    data-toggle="modal" type="button">Update Receive/Sent
                            </button>
                            <button class="btn btn-outline-danger btn-md"
                                    data-target="#deleteBtn"
                                    data-toggle="modal" type="button">Delete Account
                            </button>
                            <a href="{{route('admin.wallet_history', ['user' => $user->id])}}" class="btn btn-outline-warning btn-md" type="button">View Wallet history</a>



                            <br/>
                            <br/>
                            <form id="" method="POST" action="{{route('admin.update_balance')}}">
                                @csrf
                                <div class="element-box">
                                    <h5 class="form-header">Update Wallet Balance</h5>
                                    <fieldset class="form-group">
                                        <input name="user_id" value="{{$user->id}}" type="hidden"/>
                                        <label for="customSelect">Which cryptocurrency do you want to update?</label>
                                        <select class="custom-select block" id="customSelect" name="type"
                                                onchange="calcStake();">
                                            <option value="NULL" disabled selected>Choose Cryptocurrency</option>
                                            @foreach($supported_coins as $coin)
                                                <option value="{{$coin->id}}">{{$coin->coin_slug}}</option>
                                            @endforeach
                                           {{-- <option value="NULL" disabled>Choose Other Balances</option>

                                            @foreach($supported_tokens as $token)
                                                <option value="{{$token->slug}}">{{$token->caption}}</option>
                                            @endforeach
                                            --}}
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="customSelect">Enter the quantity of coin to fund</label>
                                        <div class="input-group">
                                            <input type="text" name="coin_qty" oninput=""
                                                   class="form-control" value="">

                                        </div>
                                        <span class="text-danger" id="errorMsg"></span>

                                    </fieldset>
                                    <button class="btn btn-outline-success btn-md btn-block" type="submit">Update
                                        Account
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a href="{{route('admin.list_trades', ['user' => $user->id])}}" class="btn btn-outline-danger btn-md" type="button">View Recent trades</a>
                        <a href="{{route('admin.view_fees', ['user' => $user->id])}}" class="btn btn-outline-warning btn-md" type="button">View user fees</a>
                        <a href="{{route('activate_trader', ['user_id' => $user->id] )}}" type="button"
                           class="btn btn-outline-primary">Activate Trader</a>
                        <br/><br/>
                        <div class="element-wrapper">
                            <form id="" method="POST" action="{{route('admin.manual_trade_update')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <div class="element-box">
                                    <h5 class="form-header">
                                        <small class="text-muted">X4</small><span>Update Trade</span>
                                    </h5>
                                    <fieldset class="form-group">
                                        <label for="customSelect">Trade type</label>
                                        <select class="custom-select block" id="customSelect" name="trade_type"
                                                onchange="">
                                            <option value="+">Gain</option>
                                            <option value="-">Loss</option>

                                        </select>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="customSelect">Enter amount ({{\App\Trader::TRADE_RETURN_COIN}})</label>
                                        <div class="input-group">
                                            <input type="text" name="trade_size" placeholder="Trade size" oninput=""
                                                   class="form-control" value="">

                                        </div>
                                        <span class="text-danger" id="errorMsg"></span>

                                    </fieldset>
                                    <button class="btn btn-outline-success btn-md btn-block" type="submit">Update
                                        Account
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
{{--                <div class="row ">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="element-box"><h5 class="form-header">Deposit Active Wallet</h5>--}}
{{--                            <div class="form-desc"></div>--}}
{{--                            <p></p>--}}

{{--                            <div class="table-responsive">--}}
{{--                                <div>--}}
{{--                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Wallet Name</th>--}}
{{--                                            <th>Wallet Network</th>--}}
{{--                                            <th>Wallet Address</th>--}}
{{--                                            <th>Wallet Tag</th>--}}
{{--                                            <th>Wallet Tag Value</th>--}}
{{--                                            <th></th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @foreach($general_wallets as $general_wallet)--}}
{{--                                            @if(!empty($general_wallet->wallet_address))--}}
{{--                                                @php--}}
{{--                                                    if(!empty($general_wallet->coin_slug)){--}}
{{--                                                $coin = \App\Token::where('slug', $general_wallet->coin_slug)->first();--}}
{{--                                                $coin_name = $coin->slug;--}}
{{--                                                }else{--}}
{{--                                                $coin = \App\Coins::where('id', $general_wallet->coin_id)->first();--}}
{{--                                                $coin_name = $coin->coin_slug;--}}
{{--                                                }--}}
{{--                                                @endphp--}}
{{--                                                <tr>--}}
{{--                                                    <td>{{$coin_name}}</td>--}}
{{--                                                    <td>{{$general_wallet->wallet_network}}</td>--}}
{{--                                                    <td style="max-width:500px; word-break:break-all;">{{substr($general_wallet->wallet_address, 0 ,4)}}***{{substr($general_wallet->wallet_address, strlen($general_wallet->wallet_address) -4, strlen($general_wallet->wallet_address) +4)}}</td>--}}
{{--                                                    <td>{{!empty($general_wallet->tag_name) ? $general_wallet->tag_name : 'N/A'}}</td>--}}
{{--                                                    <td>{{!empty($general_wallet->tag_value) ? $general_wallet->tag_value : 'N/A'}}</td>--}}
{{--                                                    <td>--}}
{{--                                                        <a href="{{route('admin.delete_wallet', ['id' => $general_wallet->id])}}"--}}
{{--                                                           class="btn btn-sm btn-danger">Delete Wallet</a></td>--}}
{{--                                                </tr>--}}
{{--                                            @else--}}
{{--                                                <p>Wallet address not set</p>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-4">
                            <div class="col-md-12 col-sm-12">

                                <h4>KYC - Uploaded Documents</h4>
                                <div class="table-responsive">
                                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                                        <tbody>
                                        @if($user->verification->count() > 0)
                                            @foreach($user->verification as $doc)
                                                <tr>
                                                    <td>{{ucfirst($doc->document_type)}}</td>
                                                    <td><a target="_blank" href="{{'/pannhaven/storage/app/public/'.$doc->path}}"
                                                           class="btn btn-sm btn-primary">View {{ucfirst($doc->document_type)}}</a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if($user->verification->count() > 0)
                            <a href="{{$user->verify_stage === \App\User::VERIFIED ? '#': route('admin.kyc_status_change', ['user_id'=> $user->id,'action' => 'verify'])}}"
                               class="btn btn-md btn-success"> {{$user->verify_stage === \App\User::VERIFIED ? 'KYC APPROVED' : 'Approve KYC Document'}}</a>
                            @if((int) $user->verify_stage !== \App\User::VERIFIED)
                                <a href="{{route('admin.kyc_status_change', ['user_id'=> $user->id,'action' => 'reject'])}}"
                                   class="btn btn-md btn-danger">Reject KYC Document</a>
                            @endif
                        @else
                            <small>No document uploaded</small>
                        @endif
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection

@section('page_js')
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="lockCoinBtn" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div class="onboarding-content with-gradient">
                    <form id="" action="{{route('admin.update_wallet')}}" method="POST">
                        @csrf
                        <div class="">
                            <h5 class="form-header"></h5>
                            <fieldset class="form-group">
                                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                <label for="customSelect">Update account wallet?</label>
                                <select class="custom-select block" id="customSelect" name="type"
                                        onchange="calcStake();">
                                    <option value="NULL" disabled selected>Choose Cryptocurrency</option>
                                    @foreach($supported_coins as $coin)
                                        <option value="{{$coin->id}}">{{$coin->coin_slug}}</option>
                                    @endforeach
                                    <option value="NULL" disabled>Choose Other Balances</option>

                                   {{-- @foreach($supported_tokens as $token)
                                        <option value="{{$token->slug}}">{{$token->caption}}</option>
                                    @endforeach
                                    --}}
                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Enter wallet address</label>
                                <div class="input-group">
                                    <input type="text" name="wallet_address" oninput=""
                                           class="form-control" placeholder="Wallet address"/>

                                </div>
                                <span class="text-danger" id="errorMsg"></span>

                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Wallet Network</label>
                                <select class="custom-select block" id="customSelect" name="wallet_network"
                                        onchange="">
                                    <option value="NULL" selected>Choose Wallet Network</option>
                                    <option value="ERC20">ERC20</option>
                                    <option value="BEP20">BEP20</option>
                                    <option value="none">None</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Enter wallet Tag Name</label>
                                <div class="input-group">
                                    <input type="text" name="tag_name" oninput=""
                                           class="form-control" placeholder="Wallet tag name (Memo ID)"/>

                                </div>
                                <span class="text-danger" id="errorMsg"></span>

                            </fieldset>

                            <fieldset class="form-group">
                                <label for="customSelect">Enter wallet Tag Value</label>
                                <div class="input-group">
                                    <input type="text" name="tag_value" oninput=""
                                           class="form-control" placeholder="Wallet tag value (e.g 1008393)"/>

                                </div>

                            </fieldset>
                            <div class="form-check">
                                <label class="form-check-label">
                                    Wallet will be automatically applied for this account;
                                </label>
                            </div>

                            <fieldset class="form-group">
                                <button class="btn btn-outline-success btn-md">Save Wallet</button>
                            </fieldset>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="receivedCoin" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div class="onboarding-content with-gradient">
                    <form id="" action="{{route('admin.update_transaction')}}" method="POST">
                        @csrf
                        <div class="">

                            <h5 class="form-header"><p>Enter negative sign with coin quantity (e.g -2) to send out
                                    coin.</p></h5>
                            <fieldset class="form-group">
                                <label for="customSelect">Wallet Address</label>
                                <div class="input-group">
                                    <input type="text" name="wallet_address" oninput=""
                                           class="form-control" placeholder="Wallet address"/>

                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Coin Amount</label>
                                <div class="input-group">
                                    <input type="text" name="coin_qty" oninput=""
                                           class="form-control" placeholder="Coin qty"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                <label for="customSelect">Coin</label>
                                <select class="custom-select block" id="customSelect" name="wallet_type"
                                        onchange="">
                                    <option value="NULL" disabled selected>select coin</option>
                                    @foreach($supported_coins as $coin)
                                        <option value="{{$coin->id}}">{{$coin->coin_slug}}</option>
                                    @endforeach
                                </select>
                            </fieldset>

                            <div class="form-check">
                                <label class="form-check-label">
                                    Wallet transactions will reflect on user end
                                </label>
                            </div>

                            <fieldset class="form-group">
                                <button class="btn btn-outline-success btn-md">Save Transaction</button>
                            </fieldset>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="deleteBtn" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div class="onboarding-content with-gradient">
                    <form id="" action="{{route('admin.delete_account')}}" method="POST">
                        @csrf
                        <div class="">
                            <input type="hidden" value="{{$user->id}}" name="delete_user_id"/>

                            <h5 class="form-header">Are your sure you want to delete {{$user->email}}'s Account</h5>


                            <fieldset class="form-group">
                                <button class="btn btn-outline-danger btn-md">Delete Account</button>
                                <button class="btn btn-outline-primary btn-md" aria-label="Close" data-dismiss="modal"
                                        type="button">Close
                                </button>

                            </fieldset>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>


    <script>


        $(document).ready(function(){$("#datatable2").DataTable()});
        $(document).ready(function(){$("#datatable1").DataTable()});
    </script>


@endsection
