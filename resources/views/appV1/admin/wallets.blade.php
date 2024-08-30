@extends('appV1.admin.layout.nav')
@section('page_title', 'Manage Wallets')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>

                <button class="btn btn-lg btn-primary" data-target="#addWallet"
                        data-toggle="modal" type="button">Add New Wallet</button>
                <br/>
                <div class="element-box"><h5 class="form-header">User Wallets</h5>
                    <style>
                        table {
                            color: grey !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Network</th>
                                <th>Tag</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Type</th>
                                <th>Address</th>
                                <th>Network</th>
                                <th>Tag</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($wallets as $wallet)

                                @php
                                    $coin = !empty($wallet->coin_slug) ? \App\Token::where('slug', $wallet->coin_slug)->first() : \App\Coins::find($wallet->coin_id);
                                @endphp
                                <tr>
                                    <td>
                                    @if(is_object($wallet->user) && !empty($wallet->user_id))
                                        {{$wallet->user->email}}
                                        @else
                                        Wallet Not Assigned
                                    @endif
                                    </td>
                                    <td>
                                        @if(!empty($wallet->coin_slug))
                                            {{$coin->caption}}
                                        @else
                                            {{$coin->coin_name}}
                                        @endif
                                    </td>
                                    <td  style="max-width:800px; word-break:break-all;">{{$wallet->wallet_address}}</td>
                                    <td>{{!empty($wallet->wallet_network) ? $wallet->wallet_network : 'N/S'}}</td>
                                    <td>{{!empty($wallet->tag_name) ? $wallet->tag_name : 'N/A'}} - {{!empty($wallet->tag_value) ? $wallet->tag_value : 'N/A'}}</td>
                                    <td title="">{{$wallet->status == \App\Wallets::ACTIVE ? 'Active' : 'Not Active'}}</td>
                                    <td><button class="btn btn-{{!empty($wallet->user_id) ?'success':'danger'}}">{{!empty($wallet->user_id) ?'Active':'Not Assigned'}}</button> </td>
                                      <td><a class="btn btn-danger" href="{{route('admin.delete_wallet', ['id' => $wallet->id])}}">Delete Wallet</a> </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('page_js')
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="addWallet" role="dialog" tabindex="-1" data-backdrop="static"
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
                                <label for="customSelect">Update account wallet?</label>
                                <select class="custom-select block" id="customSelect" name="type"
                                        onchange="calcStake();">
                                    <option value="NULL" disabled selected>Choose wallet</option>
                                    <option value="NULL" disabled>Coins</option>

                                @foreach($supported_coins as $coins)
                                    <option value="{{$coins->id}}">{{$coins->coin_name}} <small>{{$coins->is_manual_payment == 1 ? '~M' : '~A'}}</small></option>

                                    @endforeach
{{--                                    <option value="NULL" disabled>Other Wallets</option>

                                @foreach($supported_tokens as $tokens)
                                        <option value="{{$tokens->slug}}">{{$tokens->caption}}</option>
                                    @endforeach
                                    --}}
                                </select>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="customSelect">Enter wallet address</label>
                                <div class="input-group">
                                    <input type="text" name="wallet_address"
                                           class="form-control" placeholder="Wallet address"/>

                                </div>
                                <span class="text-danger" id="errorMsg"></span>

                            </fieldset>
                             <fieldset class="form-group">
                                <label for="customSelect">Wallet Network</label>
                                <select class="custom-select block" id="customSelect" name="wallet_network"
                                        onchange="">
                                    <option value="NULL" selected>Choose Wallet Network</option>
                                    <option value="ERC20" >ERC20</option>
                                    <option value="BEP20" >BEP20</option>
                                    <option value="NULL" >None</option>
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
                                           class="form-control" placeholder="Wallet wallet tag value (e.g 1008393)"/>

                                </div>

                            </fieldset>


                            <fieldset class="form-group">
                                <button class="btn btn-outline-success btn-md">Save Wallet</button>

                            </fieldset>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection
