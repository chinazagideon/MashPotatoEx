@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', $coin->coin_name.' Chart')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <p class="text-muted mb-0">{{$coin->coin_name}} Chart
                     </p>
                </div><!--end card-header-->
                <div class="card-body">
                    {!! $coin->widget !!}
                </div>
                <div class="card-footer">
                    <a href="{{route('supported_coins')}}" class="btn btn-outline-primary">View all coins</a>
                </div>
            </div>
        </div>
    </div>
@endsection
