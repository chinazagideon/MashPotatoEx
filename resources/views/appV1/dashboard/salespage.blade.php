@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Token')
@section('content')
    <div class="row">
        <div class="col-lg-5 text-center">
            <br/>
            <img src="{{asset('appV1/assets/img/misc/filecoin.png')}}" class="d-block w-100"
                 alt="...">

        </div><!--end col-->
        <div class="col-lg-5 offset-lg-1 align-self-center">
            <div class="p-5">
                <span class="bg-soft-pink p-2 rounded">Filecoin: Why it's a big deal</span>
                <h1 class="my-4 font-weight-bold">The future of data <span class="text-primary">storage</span>.</h1>
                <p class="font-14 text-muted">Filecoin has the potential to create a market that can utilize unused
                    storage space residing in data centers. With the additional supply created by Filecoin, this could
                    eventually drop the price of storage while meeting growing demand.
                </p>
                <p><strong>Properly designed incentives.</strong><br/>
                The Filecoin network is centered around aligning the incentives for all participants and can
                    rebalance and recover in response to disruptive events, which keeps data safe and flowing.</p>
                {{--                <button type="button" class="btn btn-outline-primary">Get Started</button>--}}
            </div>
        </div><!--end col-->

    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">FIL Economics</h4>
                        </div><!--end col-->
                        <div class="col-auto">
                            <a href="#" class="btn btn-sm btn-outline-light d-inline-block">View All</a>
                        </div><!--end col-->
                    </div>  <!--end row-->
                </div><!--end card-header-->
                <div class="card-body">
                    <div class="row">
                        <div class="col support-tickets">
                            <h4 class="font-weight-semibold">15,300,000 TKNS</h4>
                            <h5>Available Tokens</h5>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <ul class="list-inline url-list mb-0">
                                <li class="list-inline-item mb-2">
                                    <i class="fas fa-circle text-primary font-10"></i>
                                    <span>Miners</span>
                                </li>
                                <li class="list-inline-item mb-2">
                                    <i class="fas fa-circle text-info font-10"></i>
                                    <span>Protocol Labs</span>
                                </li>
                                <li class="list-inline-item mb-3">
                                    <i class="fas fa-circle text-success font-10"></i>
                                    <span>Investors</span>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                    <div class="progress mt-4">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                             role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                             aria-valuemax="100">70%
                        </div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="20"
                             aria-valuemin="0" aria-valuemax="100">20%
                        </div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="10"
                             aria-valuemin="0" aria-valuemax="100">10%
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->


    </div>
@endsection
