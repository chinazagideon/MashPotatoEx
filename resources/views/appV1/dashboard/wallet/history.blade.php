@extends('appV1.dashboard.layouts.sidebar')
@section('page_title', 'Wallet History')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('page_title')</h4>
                    <p class="text-muted mb-0">
                    </p>
                </div><!--end card-header-->
                <div id="wallet_history">
                    <div class="card-body">
                        <table id="suppliersTable" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Coin</th>
                                <th>Action</th>
                                <th>Value</th>
                                <th>Fiat Amount</th>
                                <th>TransID</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr class="template" v-for="(history, index) in histories" :key="history.trans_id">
                                <td>@{{  index= index+1 }}</td>
                                <td>@{{ history.coin_name }}</td>
                                <td>@{{ history.type }}</td>
                                <td>@{{ history.coin_amount }}@{{ history.coin_slug }}</td>
                                <td>@{{ history.fiat_amount }}@{{ history.fiat_currency }}</td>
                                <td>@{{ history.trans_id }}
                                    <a v-if="history.show_link" :href="history.tx_url" target="_blank" ><i class="dripicons-link" alt="view"></i> </a>
                                </td>
                                <td>@{{ history.timestamp }}</td>
                                <td>

                                    <span v-if="history.status_code === 1" class="badge badge-pill" :class="'badge-outline-success'">
                                    @{{ history.status }}
                                    </span>
                                    <span v-if="history.status_code === -1" class="badge badge-pill" :class="'badge-outline-danger'">
                                    @{{ history.status }}
                                    </span>
                                    <span v-if="history.status_code === 0" class="badge badge-pill" :class="'badge-outline-primary'">
                                    @{{ history.status }}
                                    </span>
                                    <a :href="history.tx_url" target="_blank" class="btn btn-outline-primary btn-sm" v-if="history.show_link !== '' ? history.show_link: ''"><i class="dripicons-exit"></i></a>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{Auth::user()->id}}" id="usr_id">
@endsection
@section('page_css')
    <!-- DataTables -->
    <link href="{{asset('appV1/dashb/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('appV1/dashb/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('appV1/dashb/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet"
          type="text/css"/>

@endsection


@section('page_js')

    <script src="{{asset('appV1/dashb/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script>


        let usr_id = $('#usr_id').val();
            new Vue({
                el: "#wallet_history",
                data() {
                    return {
                        histories: [],
                        usr: usr_id,
                        count: 1,
                        dt: null,
                        loaded: false,
                    }
                },
                mounted() {
                    this.fetchWalletHistory();
                    setInterval(this.fetchWalletHistory, 10000);

                },
                methods: {
                    fetchWalletHistory: function () {
                        axios.get('/api/wallet/history/' + this.usr)
                            .then(response => {
                                this.histories = response.data.data;
                            }).catch(error => {
                            console.log('Error', error);
                        })
                    },

                },
                watch: {
                    histories(val) {
                        this.dt = $('#suppliersTable').DataTable();
                        this.dt.destroy();
                        this.$nextTick(() => {
                            this.dt = $('#suppliersTable').DataTable()
                        });
                    }
                }
            });


    </script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('appV1/dashb/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('appV1/dashb/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

@endsection
