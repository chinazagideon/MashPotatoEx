@extends('appV1.admin.layout.nav')
@section('page_title', 'Users')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                {{--                <h6 class="element-header">@yield('page_title')</h6>--}}
                <h4>System Status</h4>
                <div class="row">
                    @if(isset($system_controls))
                    @foreach($system_controls->data as $key => $system)
                        <div class="col-md-3 col-sm-12">
                            <div class="alert {{$system === 'ACTIVE' ? 'alert-success': 'alert-danger'}} ">
                                <p>{{strtoupper(str_replace("_" , " ", $key))}}: <span
                                        class="text {{$system === 'ACTIVE' ? 'text-success': 'text-danger'}}">{{str_replace("-", " ", $system)}}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div class="element-box"><h5 class="form-header">Registered Clients</h5>
                    <style>
                        table {
                            color: grey !important;
                        }
                    </style>

                    <button href="" class="btn btn-primary" data-target="#coinEditAPY"
                            data-toggle="modal" type="button">Update Coin APY
                    </button>
                    <button href="" class="btn btn-primary" data-target="#sendMsg"
                            data-toggle="modal" type="button"><i class="os-icon os-icon-message-square"></i> General Message
                    </button>
                    <button href="" class="btn btn-outline-warning" data-target="#tradeAPY"
                            data-toggle="modal" type="button"><i class="os-icon os-icon-robot-2"></i> Set BotTrader
                    </button>
                    <button href="" class="btn btn-danger" data-target="#setting_pane"
                            data-toggle="modal" type="button"><i class="os-icon os-icon-settings"></i> System Control
                    </button>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                {{--                                <th>Username</th>--}}
                                <th>Mem. ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>KYC Status</th>
                                <th>Registered</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                {{--                                <th>Username</th>--}}
                                <th>Mem. ID</th>

                                <th>Email</th>
                                <th>Phone</th>
                                <th>KYC Status</th>
                                <th>Registered</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($users as $user)

                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$user->fname . ' '. $user->lname}}</td>
                                    {{--                                    <td>{{$user->username}}</td>--}}
                                    <td>{{strtoupper($user->member_id)}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if((int) $user->verify_stage == \App\User::PENDING_APPROVAL)
                                            <span class="badge badge-warning"><span
                                                    class="os-icon os-icon-pause"></span></span>
                                        @elseif((int) $user->verify_stage == \App\User::VERIFIED)
                                            <span class="badge badge-success"><span
                                                    class="os-icon os-icon-check"></span></span>
                                        @else
                                            <span class="badge badge-danger"><span
                                                    class="os-icon os-icon-user-x"></span></span>
                                        @endif

                                    </td>
                                    <td>{{!empty($user->created_at) ? $user->created_at->diffForHumans() : ''}}</td>

                                    <td><a href="{{route('admin.manage', ['id' => $user->id])}}"
                                           class="mr-2 mb-2 btn btn-outline-primary" type="button"> Continue</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--------------------
START - Chat Popup Box
-------------------->
        </div>
    </div>

    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="coinEditAPY" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div class="onboarding-content with-gradient">
                    <form id="" action="{{route('admin.update_apy')}}" method="POST">
                        @csrf
                        <div class="">

                            <h5 class="form-header">Select the coin to update the APY</h5>
                            <fieldset class="form-group">
                                <label for="customSelect">Select Coin</label>
                                <select class="custom-select block" id="customSelect" name="coin_slug"
                                        onchange="">
                                    <option value="NULL" disabled selected>select coin</option>
                                    @foreach($supported_coins as $coin)
                                        <option
                                            value="{{$coin->id}}">{{$coin->coin_slug .' (APY:'.$coin->apr.'%)'}}</option>
                                    @endforeach

                                </select>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Coin APY</label>
                                <div class="input-group">
                                    <input type="text" name="apy" oninput=""
                                           class="form-control" placeholder="Coin APY (e.g 10)"/>
                                </div>
                            </fieldset>


                            <fieldset class="form-group">
                                <button class="btn btn-outline-success btn-md">Update APY</button>
                            </fieldset>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="tradeAPY" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div id="updateROI">

                    <div class="onboarding-content with-gradient">
                        <form id="" action="{{route('admin.update_tradebot')}}" method="POST">
                            @csrf

                            <h5 class="form-header">Update TradeBot <code>x4Defaults</code></h5>
                            <div class="alert " :class="alert_bg" v-if="display_msg !== null">
                                <p class="">@{{ display_msg }}</p>
                            </div>
                            <fieldset class="form-group " style="padding: 30px; background: #0a0b4e">
                                <p>Customize bot for a user</p>
                                <label for="customSelect">Select Username</label>
                                <select class="custom-select block" id="custom_usr_id"
                                        v-on:change="getConfig(x4default, custom_usr_id)" v-model="custom_usr_id"
                                        name="custom_usr_id"
                                        onchange="">
                                    <option :value="''" selected>~setBot all>user</option>

                                    @foreach($users as $usr)
                                        <option :value="'{{$usr->id}}'">~{{$usr->username}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">


                                    <fieldset class="form-group">
                                        <input type="hidden" name="x4default" :id="x4default"
                                               :value="'{{\App\Trader::BOT_IDENTIFIER}}'" id="x4default"
                                               value="{{\App\Trader::BOT_IDENTIFIER}}">
                                        <label for="customSelect">Trade returns</label>
                                        <select class="custom-select block" id="customSelect" name="coin_slug"
                                                onchange="">
                                            <option value="NULL" disabled selected>TradeBot Config</option>
                                        </select>
                                    </fieldset>

                                </div>
                                <div class="col-md-6">
                                    <fieldset class="form-group">

                                        <label for="customSelect">Return interval  </label>
                                        <input type="hidden" name="return_interval" id="return_interval"
                                               value="hourly_return">
                                        <select class="custom-select block" id="customSelect" name="coin_slug"
                                                onchange="">
                                            <option value="NULL" disabled selected>Hourly Trade</option>
                                        </select>
                                    </fieldset>
                                    <small class="text-muted">interval for
                                        bot
                                        trade updates</small>
                                </div>
                            </div>

                            <fieldset class="form-group">

                                <label for="customSelect">Monthly Return(%) &nbsp;<code>@{{
                                        varToFloat(x4.month_return)
                                        }}%</code> <small class="text-muted">Use this field to
                                        control the rest</small></label>
                                <div class="input-group">
                                    <input type="text" v-model="roi.monthly_roi"
                                           v-on:input="calculatePercentage"
                                           name="monthly_return" :disabled="!monthly_field_state" oninput=""
                                           class="form-control" @keypress="isNumber($event)"
                                           placeholder="0.00"/>
                                </div>
                                <p :class="warning_col">@{{warning_msg}}</p>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-6">

                                    <fieldset class="form-group">
                                        <label for="customSelect">Weekly Return(%) &nbsp;<code>@{{
                                                varToFloat(x4.weekly_return)
                                                }}%</code></label>
                                        <div class="input-group">
                                            <input type="text" v-model="roi.weekly_roi"
                                                   v-on:input="calculatePercentage"
                                                   name="weekly_return" :disabled="!weekly_field_state" oninput=""
                                                   class="form-control" placeholder="0.00"/>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="col-md-6">

                                    <fieldset class="form-group">
                                        <label for="customSelect">Daily Return (%) &nbsp;<code>@{{
                                                varToFloat(x4.daily_return)
                                                }}%</code></label>

                                        <div class="input-group">
                                            <input type="text" v-model="roi.daily_roi"
                                                   v-on:input="calculatePercentage"
                                                   :disabled="!daily_field_state" name="daily_return" oninput=""
                                                   class="form-control" placeholder="0.00"/>
                                        </div>

                                    </fieldset>
                                </div>
                            </div>

                            <p>Hourly: @{{ roi.hourly_roi }}% &nbsp;<code>@{{ varToFloat(x4.daily_return)
                                    }}%</code>
                            </p>

                            <fieldset class="form-group">
                                <button :disabled="disable_btn" type="button" onclick="event.preventDefault()"
                                        v-on:click="saveConfig"
                                        class="btn btn-outline-success btn-md">Update
                                </button>
                                <button aria-label="Close" class=" btn btn-warning" data-dismiss="modal"
                                        type="button">
                                    <span class="close-label"></span><span
                                        class="os-icon os-icon-close"></span></button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="setting_pane" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div id="">

                    <div class="onboarding-content with-gradient">
                        <form id="" action="{{route('admin.system_control')}}" method="POST">
                            @csrf

                            <h5 class="form-header"> System Status<code>_~SETTINGS</code></h5>

                            <fieldset class="form-group">
                                <input type="hidden" name="x4defaults"
                                       value="{{\App\X4Defaults::GENERAL_SYSTEM_CONFIG_SLUG}}">
                                <label for="customSelect">Deposit Status</label>
                                <select class="custom-select block" id="customSelect" name="deposit_status"
                                        onchange="">
                                    <option value="ACTIVE">Deposit: ACTIVE</option>
                                    <option value="NOT-ACTIVE">Deposit: NOT ACTIVE</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">

                                <label for="customSelect">Withdrawal Status</label>
                                <select class="custom-select block" id="customSelect" name="withdrawal_status"
                                        onchange="">
                                    <option value="ACTIVE">Withdrawal : ACTIVE</option>
                                    <option value="NOT-ACTIVE">Withdrawal: NOT ACTIVE</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">

                                <label for="customSelect"><code>x4bot</code> Trader</label>
                                <select class="custom-select block" id="customSelect" name="trader_status"
                                        onchange="">
                                    <option value="ACTIVE">Trader: ACTIVE</option>
                                    <option value="NOT-ACTIVE">Trader: NOT ACTIVE</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">

                                <label for="customSelect">Coin Swap</label>
                                <select class="custom-select block" id="customSelect" name="swap_status"
                                        onchange="">
                                    <option value="ACTIVE">Swap: ACTIVE</option>
                                    <option value="NOT-ACTIVE">Swap: NOT ACTIVE</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">

                                <label for="customSelect">Coin Staking</label>
                                <select class="custom-select block" id="customSelect" name="staking_status"
                                        onchange="">
                                    <option value="ACTIVE">Staking: ACTIVE</option>
                                    <option value="NOT-ACTIVE">Staking: NOT ACTIVE</option>
                                </select>
                            </fieldset>


                            <fieldset class="form-group">
                                <button type="submit"
                                        class="btn btn-outline-success btn-md btn-block">Update
                                </button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="sendMsg" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div id="">

                    <div class="onboarding-content with-gradient">
                        <form id="" action="{{route('admin.send_msg')}}" method="POST">
                            @csrf
                            <h5 class="form-header"> Send a system general message</h5>
                            <p id="msg_status"></p>

                            <fieldset class="form-group">
                                <input type="hidden" name="x4defaults"
                                       value="{{\App\X4Defaults::SEND_MSG}}">
                                <label for="customSelect">Display coverage</label>
                                <select class="custom-select block" id="customSelect" name="display"
                                        onchange="">
                                    <option value="General">General Display</option>
                                    <option value="CUSTOM" disabled>Customize</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">

                                <label for="customSelect">Display Status</label>
                                <select class="custom-select block" id="customSelect" name="display_status"
                                        onchange="">
                                    <option value="SHOW">Status: Show</option>
                                    <option value="HIDE">Status: Hide</option>
                                </select>
                            </fieldset>
                            <fieldset class="form-group">

                                <label for="customSelect">Message Type</label>
                                <select class="custom-select block" id="customSelect" name="msg_type"
                                        onchange="">
                                    <option value="bg-danger">Status: Error</option>
                                    <option value="bg-success">Status: Success</option>
                                </select>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset class="form-group">

                                        <label for="customSelect">Caption  </label>
                                        <input type="text" class="form-control" name="caption" id="msg_caption"
                                               >

                                    </fieldset>
                                    <small class="text-muted">message caption</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
{{--                                    <fieldset class="form-group">--}}

                                        <label for="customSelect">Message  </label>
                                        <textarea class="form-control" placeholder="Message max of 1000" name="message" id="msg_content">
                                        </textarea>

{{--                                    </fieldset>--}}
                                    <small class="text-muted">message body</small>
                                </div>
                            </div>



                            <fieldset class="form-group">
                                <button type="submit"
                                        class="btn btn-outline-success btn-md btn-block">Update
                                </button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{Auth::user()->id}}" id="usr_id"/>
@endsection
@section('page_js')
    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        var usr_id = $('#usr_id').val();
        new Vue({
            el: "#updateROI",
            data() {
                return {
                    roi: {
                        monthly_roi: 0,
                        weekly_roi: 0,
                        daily_roi: 0,
                        hourly_roi: 0,
                    },
                    monthly_field_state: true,
                    weekly_field_state: false,
                    daily_field_state: false,
                    usr: usr_id,
                    x4default: $('#x4default').val(),
                    return_interval: $('#return_interval').val(),
                    display_msg: {
                        type: Object,
                    },
                    warning_msg: null,
                    warning_col: null,
                    disable_btn: true,
                    alert_bg: 'alert-info',
                    x4: {
                        type: Object,
                    },
                    custom_usr_id: null,

                }
            },
            mounted() {
                console.log(this.x4default);
                this.display_msg = null;
                this.warning_msg = null;
                this.getConfig(this.x4default, this.custom_usr_id);

            },
            methods: {
                calculatePercentage: function () {
                    this.alert_bg = "alert-info";

                    if (this.roi.monthly_roi >= 0 && this.roi.monthly_roi !== null && this.roi.monthly_roi !== ' ') {

                        this.display_msg = "X4: Calculated confirm values";
                        if (this.roi.monthly_roi >= 10) {
                            this.warning_msg = "x4: Warning! trade return might be outrageous accumulatively, " +
                                "Oops!, can't disable the button cos you are admin.";
                            this.disable_btn = false;

                            this.warning_col = "text-danger";
                        } else if (this.roi.monthly_roi >= 5 && this.roi.monthly_roi <= 9.9) {
                            this.warning_msg = "X4: trade return is moderate, but high accumulatively.";
                            this.warning_col = "text-warning";
                            this.disable_btn = false;


                        } else if (this.roi.monthly_roi >= 0.1 && this.roi.monthly_roi <= 4.9) {
                            if (Number(this.roi.monthly_roi) == 0 || this.roi.monthly_roi == null) {
                                this.warning_msg = "X4: 0 is not a valid input try 0.3 or 0.1";
                                this.warning_col = "text-danger";

                            } else {
                                this.warning_msg = "X4: Everything appears normal.";
                                this.warning_col = "text-success";
                            }
                            this.disable_btn = false;

                        } else {

                            if (this.roi.monthly_roi == 0 || this.roi.monthly_roi == null) {
                                this.warning_msg = "X4: Sorry Boss, can't let you use 0%, cos it will crash our system";
                                this.warning_col = "text-danger";
                                this.disable_btn = true;
                            } else {
                                this.warning_msg = "X4: Warning might be very low return for subscribers, I suggest you try a value > 1";
                                this.warning_col = "text-primary";
                                this.disable_btn = false;
                            }

                        }

                        this.roi.weekly_roi = this.roi.monthly_roi / 4;
                        this.roi.daily_roi = this.roi.weekly_roi / 7;
                        this.roi.hourly_roi = this.roi.daily_roi / 24;

                    } else {
                        this.roi.monthly_roi = 0;
                        this.roi.weekly_roi = 0;
                        this.roi.daily_roi = 0;
                        this.roi.hourly_roi = 0;

                        this.monthly_field_state = true;
                        this.daily_field_state = true;
                        this.weekly_field_state = true;

                        this.disable_btn = true;
                        this.display_msg = "Enter the percentage for any of the field to calculate";
                    }
                },
                isNumber: function (evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                        evt.preventDefault();
                    } else {
                        return true;
                    }
                },
                saveConfig: function () {
                    axios.get("/api/admin/bot/update?" +
                        "monthly_return=" + this.roi.monthly_roi +
                        "&monthly_return=" + this.roi.monthly_roi +
                        "&weekly_return=" + this.roi.weekly_roi +
                        "&daily_return=" + this.roi.daily_roi +
                        "&hourly_return=" + this.roi.hourly_roi +
                        "&usr_id=" + this.usr_id +
                        "&x4default=" + this.x4default +
                        "&return_interval=" + this.return_interval +
                        "&cs_user_id=" + this.custom_usr_id
                    ).then(response => {
                        this.disable_btn = true;
                        this.alert_bg = "alert-success";
                        this.display_msg = response.data.msg;
                    }).catch(error => {
                        console.log("Error", error);
                    }).finally(() => {
                        this.getConfig(this.x4default, this.custom_usr_id);
                    })
                },
                getConfig: function (xvalue, usr) {
                    axios.get('/api/x4/' + xvalue + '/' + usr)
                        .then(response => {
                            this.x4 = response.data.data.data;
                        }).catch(error => {
                        console.log("error", error);
                    })
                },
                varToFloat: function (value) {
                    return parseFloat(value).toFixed(4);
                },

            }
        });
        getMessage();
        function getMessage(){
            $.ajax({
                url: '/api/broadcast/messages',
                data: {},
                type: 'GET',
                success: function(result){

                    if(result.data.data.status === "SHOW"){
                        $('#msg_status').html("STATUS: <p class='text-success'>MESSAGE DISPLAYED</p>");
                    }else{
                        $('#msg_status').html("STATUS: <p class='text-danger'>MESSAGE HIDDEN</p>");

                    }
                        $('#msg_caption').val(result.data.data.caption);
                        $('#msg_content').html( result.data.data.msg );
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
    </script>
@endsection
@section('page_css')
    <script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection
