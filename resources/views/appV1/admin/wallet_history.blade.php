@extends('appV1.admin.layout.nav')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="element-box"><h5 class="form-header">Sent/Received History</h5>
                <div class="form-desc">
                    <a href="{{route('admin.manage', ['id' => $user->id])}}"
                       class="mr-2 mb-2 btn btn-outline-warning" type="button"> Return to {{$user->fname}}'s Profile</a>
                </div>
                <style>
                    table {
                        color: grey !important;
                    }
                </style>
                <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Coin Value</th>
                            <th>Coin</th>
                            <th>Fiat Value</th>
                            <th>Address</th>
                            <th>TransID</th>
                            <th>Timestamp</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Type</th>
                            <th>Coin Value</th>
                            <th>Coin</th>
                            <th>Fiat Value</th>
                            <th>Address</th>
                            <th>TransID</th>
                            <th>Timestamp</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($transactions as $tran)
                            @if($tran->type == 'receive' || $tran->type === 'send' || $tran->type ==='deposit' || $tran->type === 'withdraw')
                                @php
                                    $coin = new \App\Http\Controllers\CoinsController();

                                    $coin_1 = $coin->getCoin(null, $tran->coin_id);
                                    $coin_2 = $coin->getCoin(null, $tran->reference_id);

                                @endphp

                                <tr>
                                    <td>{{Ucfirst($tran->type)}}</td>
                                    <td>{{$coin_1->coin_slug === "USDT" ?number_format($tran->coin_qty,2)  : round($tran->coin_qty,6) . $coin_1->coin_slug}}</td>
                                    <td>{{$coin_1->coin_name}}</td>
                                    <td>{{number_format($tran->fiat_amount). $tran->fiat_currency}}</td>
                                    <td>{{!empty($tran->address) ? substr($tran->address, 0 ,4)."***". substr($tran->address, strlen($tran->address) -4, strlen($tran->address) +4) : 'N/A'}}</td>
                                    <td>
                                        ****{{substr($tran->trans_id, strlen($tran->trans_id)-5, strlen($tran->trans_id)) }}</td>
                                    <td>{{$tran->created_at}}</td>
                                    <td>
                                        {{$tran->status == \App\Transactions::ACTIVE ? "Completed" : "Pending"}}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning"
                                                  data-target="#viewLog{{$tran->trans_id}}"
                                                  data-toggle="modal" type="button">View
                                        </button>
                                    </td>
                                    <td>
                                        @if($tran->status === \App\Transactions::ACTIVE)
                                            @if($tran->type === "send")
                                                <button class="btn btn-sm btn-danger">Sent</button>
                                            @else
                                                <button class="btn btn-sm btn-success">Received</button>
                                            @endif
                                        @elseif($tran->status == \App\Transactions::CANCELLED)
                                            <button class="btn btn-sm btn-danger">Cancelled</button>
                                        @else
                                            <button class="btn btn-sm btn-primary"
                                                    data-target="#approveBtn{{$tran->id}}"
                                                    data-toggle="modal" type="button">Approve
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                    data-target="#cancelBtn{{$tran->id}}"
                                                    data-toggle="modal" type="button">Cancel
                                            </button>

                                        @endif
                                    </td>
                                </tr>
                                <div aria-hidden="true" class="onboarding-modal modal fade animated"
                                     id="cancelBtn{{$tran->id}}" role="dialog" tabindex="-1" data-backdrop="static"
                                     data-keyboard="false">
                                    <div class="modal-dialog modal-centered" role="document">
                                        <div class="modal-content text-center">
                                            <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button">
                                                <span class="close-label"></span><span
                                                    class="os-icon os-icon-close"></span></button>
                                            <div class="onboarding-content with-gradient">

                                                <div class="">
                                                    <h5 class="form-header"></h5>


                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            You are about to Cancel transaction #{{$tran->trans_id}}
                                                        </label>
                                                        <h4>Transaction Details</h4>
                                                        <h6>Type: {{Ucfirst($tran->type)}}</h6>

                                                        <h6>Coin: {{Ucfirst($tran->coin->coin_slug)}}</h6>
                                                        <h6>
                                                            Amount: {{number_format($tran->fiat_amount). $tran->fiat_currency}}</h6>
                                                        @if($tran->type == 'send')
                                                            <hr/>
                                                            <h6>Receiver
                                                                Address: {{!empty($tran->address) ? $tran->address : 'not applicable'}}</h6>
                                                        @endif
                                                    </div>

                                                    <fieldset class="form-group">
                                                        <a href="{{route('admin.update_status', ['trans' => $tran->trans_id, 'action' => 'cancel'])}}"
                                                           class="btn btn-outline-success btn-md">Cancel
                                                            Transaction</a>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div aria-hidden="true" class="onboarding-modal modal fade animated"
                                     id="viewLog{{$tran->trans_id}}" role="dialog" tabindex="-1" data-backdrop="static"
                                     data-keyboard="false">
                                    <div class="modal-dialog modal-centered" role="document">
                                        <div class="modal-content text-center">
                                            <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button">
                                                <span class="close-label"></span><span
                                                    class="os-icon os-icon-close"></span></button>
                                            <div class="onboarding-content with-gradient">

                                                <div class="">
                                                    <h5 class="form-header"></h5>


                                                    <div class="form-check">
                                                        <label class="form-check-label text-muted">
                                                            Remark for transaction
                                                        </label>
                                                        <hr/>
                                                        <p>{{is_object($tran->payment) ? $tran->payment->comment: 'Payment is manual'}}</p>
                                                        <h4>Invoice URL</h4>
                                                        <p>{{is_object($tran->payment) ? $tran->payment->invoice_url: 'Payment is manual'}}</p>
                                                        <h5 class="text-muted">Gateway Response</h5>
                                                        <h4>{{is_object($tran->payment) ? strtoupper($tran->payment->status_text): 'Payment is Manual'}}</h4>
                                                        <h5 class="text-muted">Payment Link</h5>
                                                        <p>
                                                            @if(is_object($tran->payment))
                                                                {!! !empty($tran->payment->tx_url) ?"<a target='_blank' href='".$tran->payment->tx_url."'>View Link</a>" :  "No Link"!!}
                                                            @else
                                                                Payment is Manual
                                                            @endif
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div aria-hidden="true" class="onboarding-modal modal fade animated"
                                     id="approveBtn{{$tran->id}}" role="dialog" tabindex="-1" data-backdrop="static"
                                     data-keyboard="false">
                                    <div class="modal-dialog modal-centered" role="document">
                                        <div class="modal-content text-center">
                                            <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button">
                                                <span class="close-label"></span><span
                                                    class="os-icon os-icon-close"></span></button>
                                            <div class="onboarding-content with-gradient">

                                                <div class="">
                                                    <h5 class="form-header"></h5>


                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            You are about to approve transaction
                                                            #{{$tran->trans_id}}
                                                        </label>
                                                        <h4>Transaction Details</h4>
                                                        <h6>Type: {{Ucfirst($tran->type)}}</h6>
                                                        <h6>Coin: {{Ucfirst($tran->coin->coin_slug)}}</h6>
                                                        <h6>Coin Quantity: {{Ucfirst($tran->coin_qty)}}</h6>
                                                        <h6>
                                                            Amount: {{number_format($tran->fiat_amount). $tran->fiat_currency}}</h6>
                                                        @if($tran->type == 'send')
                                                            <hr/>
                                                            <h6>Receiver
                                                                Address: {{!empty($tran->address) ? $tran->address : 'not applicable'}}</h6>
                                                        @endif
                                                    </div>

                                                    <fieldset class="form-group">
                                                        <a href="{{route('admin.update_status', ['trans' => $tran->trans_id, 'action' => 'approve'])}}"
                                                           class="btn btn-outline-success btn-md">Approve
                                                            Transaction</a>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>

@endsection
