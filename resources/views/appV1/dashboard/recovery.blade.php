@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Recovery')
@section('content')
    <div class="row">
        @if((int) Auth::user()->wallet_backup === \App\User::WALLET_BACKUP_COMPLETE)
        <div class="col-md-3"></div>
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="task-box">
                        <div class="task-priority-icon"><i class="fas fa-check text-success"></i></div>

                        <h5 class="mt-0">Wallet Backup Completed</h5>
                        <p class="text-muted mb-1">Wallet backup
                        </p>
                        <p class="text-muted text-right mb-1">100% Complete</p>
                        <div class="progress mb-4" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div><!--end task-box-->
                </div><!--end card-body-->
            </div>
        </div>
        @else
        <div class="col-sm-12">

        <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Backup Wallet</h4>
                    <p class="text-muted mb-0">12 recovery phrase for wallet backup below, take note of them and click
                        on verify button to verify them.</p>
                </div><!--end card-header-->
                <div class="card-body">
                    <form id="form-horizontal" class="form-horizontal form-wizard-wrapper  wizard clearfix vertical" role="#">
                        <h3>Recovery Phrase</h3>
                        <fieldset>
                            <div class="row">
                                @php

                                    $count = 1;
                                @endphp
                                @foreach($phrases as $phrase)

                                    <div class="col-lg-4">
                                        <div class="card mb-3">
                                            <div class="row no-gutters">
{{--                                                <div class="col-md-3 align-self-center text-center">--}}
{{--                                                    <img class="" height="80"--}}
{{--                                                         src="{{asset('appV1/dashb/assets/images/widgets/btc.png')}}"--}}
{{--                                                         alt="Card">--}}
{{--                                                </div>--}}
                                                <div class="col-md-12">
                                                    <div class="card-header text-center">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title">Recovery Word ({{$phrase->serial_no}})</h4>
                                                            </div><!--end col-->

                                                        </div>  <!--end row-->
                                                    </div><!--end card-header-->
                                                    <div class="card-body text-center">

                                                        <h2 class="card-text">{{$phrase->word}}</h2>
                                                        {{--                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                                                    </div><!--end card-body-->
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end card-->
                                    </div><!--end col-->
                                @endforeach
                            </div><!--end row-->

                        </fieldset><!--end fieldset-->

                        <h3>Verify Recovery Phrase</h3>
                        <fieldset>
                            <div class="row">

                                <div class="col-md-2"></div>
                                <div class="col-md-offset-2 col-lg-offset-2 col-md-7 col-lg-7">
                                    <h4>Enter the Words according to the serial number attached to required to verify your backup.</h4>
                                    <div class="row">
{{--                                        <form action="" id="backup_form">--}}
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="txtFirstNameShipping" class="col-lg-3 col-form-label">Fourth
                                                    Word</label>
                                                <div class="col-lg-9">
                                                    <input id="fourth_word" name="fourth_word" type="text"
                                                           class="form-control">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="txtLastNameShipping" class="col-lg-3 col-form-label">Third
                                                    Word</label>
                                                <div class="col-lg-9">
                                                    <input id="third_word" name="third_word" type="text"
                                                           class="form-control">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
{{--                                        </form>--}}
                                    </div><!--end row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="tenth_word" class="col-lg-3 col-form-label">Tenth
                                                    Word</label>
                                                <div class="col-lg-9">
                                                    <input id="tenth_word" name="tenth_word" type="text"
                                                           class="form-control">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="txtEmailAddressShipping" class="col-lg-3 col-form-label">Eleventh
                                                    Word</label>
                                                <div class="col-lg-9">
                                                    <input id="elevent_word" name="elevent_word"
                                                           type="text" class="form-control">
                                                </div>
                                            </div><!--end form-group-->
                                        </div><!--end col-->
                                       <span id="errorPane"></span>
                                    </div><!--end row-->

                                </div>
                            </div>
                        </fieldset><!--end fieldset-->

                        <h3>Backup Complete</h3>
                        <fieldset>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input type="hidden" name="verifier" value="{{Auth::user()->id}}">
                                    <button class="btn btn-lg btn-success" id="finish_backup_btn" onclick="backUpWallet()" type="button">Finish Wallet Backup</button>
                                </div>
                            </div>
                        </fieldset><!--end fieldset-->

{{--                        <h3>Confirm Detail</h3>--}}
{{--                        <fieldset>--}}
{{--                            <div class="p-3">--}}
{{--                                <label class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input">--}}
{{--                                    <span class="custom-control-indicator"></span>--}}
{{--                                    <span--}}
{{--                                        class="custom-control-description">I agree with the Terms and Conditions.</span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </fieldset><!--end fieldset-->--}}
                    </form><!--end form-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        @endif

    </div><!--end row-->

    <input type="hidden" name="app_url" value="{{url('api/')}}"/>
@endsection
@section('page_css')

    <!--Form Wizard-->
    <link rel="stylesheet" href="{{asset('appV1/dashb/plugins/jquery-steps/jquery.steps.css')}}">
@endsection

@section('page_js')
    <script src="{{asset('appV1/dashb/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/assets/pages/jquery.form-wizard.init.js')}}"></script>

    <script type="text/javascript">
        var app_url = $('[name=app_url]');


        var finish_btn = $('#finish_backup_btn');

        finish_btn.on('click', function(){
            alert('here');
            console.log('here');
        });

        $(".actions a[href$='#finish']").on('click', function () {
            alert('here');
            backUpWallet();
        });

        function backUpWallet()
        {
            var third_word = $('#third_word').val();
            var fourth_word = $('#fourth_word').val();
            var tenth_word = $('#tenth_word').val();
            var elevent_word = $('#elevent_word').val();
            var verifier = $('[name=verifier]').val();
            $.ajax({
                url: app_url.val()+"/wallet/backup/validate",
                data: 'third_word='+third_word+'&fourth_word='+fourth_word+'&tenth_word='+tenth_word+'&elevent_word='+elevent_word+'&verifier='+verifier,
                type: 'POST',
                async: false,
                success: function(data){
                    if(data.status === true){
                        console.log(data);
                        location.reload(true);
                    }else{
                        $(".actions a[href$='#previous']").click();

                        $('#errorPane').html("<div class=\"alert alert-danger border-0\" role=\"alert\">\n" +
                            "                                        <strong>Oh snap!</strong> Unable to verify backup, click previous button below to restart backup.\n" +
                            "                                    </div>")

                    }

                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
    </script>

@endsection
