@extends('appV1.admin.layout.nav')
@section('page_title', 'Upload Mining')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">@yield('page_title')</h6>


                <div class="element-box"><h5 class="form-header">@yield('page_title')</h5>
                    <button data-target="#updateMiningProduct"
                            data-toggle="modal" type="button" class="btn btn-lg btn-warning"><i class="icon icon-add"></i> Add New Product</button>

                    <div class="form-desc">Mining Page Items.</div>
                    <style>
                        table{
                            color: grey !important;
                        }
                    </style>
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Tag</th>
                                <th>Product Code</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>Name</th>
                                <th>Price</th>
                                <th>Tag</th>
                                <th>Product Code</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($minings as $rig)
                                <tr>

                                    <td>{{$rig->caption}}</td>
                                    <td>${{number_format($rig->price, 2)}}</td>
                                    <td>{{$rig->tag}}</td>
                                    <td>...{{strtoupper(substr($rig->product_id, strlen($rig->product_id) -5, strlen($rig->product_id)))}}</td>
                                    <td>
                                        @if($rig->status === \App\Mining::ACTIVE)
                                            <span class="badge badge-pill badge-outline-success">Displayed</span>

                                        @elseif($rig->status === \App\Mining::DEACTIVATED)
                                            <span class="badge badge-pill badge-outline-danger">Hidden</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                                <a href="{{route('admin.mining_status', ['action' => 'display', 'trans_id' => $rig->product_id])}}" class="btn btn-success">Display</a>
                                                <a href="{{route('admin.mining_status', ['action' => 'hide', 'trans_id' => $rig->product_id])}}"  class="btn btn-danger">Hide</a>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-md btn-primary" name="edit_product" value="{{$rig->product_id}}">Edit Item</button></td>

                                </tr>
                                <button data-target="#editMiningProduct{{$rig->product_id}}" style="display: none" id="{{$rig->product_id}}"
                                        data-toggle="modal" type="button" class="btn btn-lg btn-warning"><i class="icon icon-add"></i> E</button>

                                <div aria-hidden="true" class="onboarding-modal modal fade animated"
                                     id="editMiningProduct{{$rig->product_id}}" role="dialog" tabindex="-1" data-backdrop="static"
                                     data-keyboard="false">
                                    <div class="modal-dialog modal-lg modal-centered" role="document">
                                        <div class="modal-content text-left">
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                <span class="close-label"></span><span
                                                    class="os-icon os-icon-close"></span></button>
                                            <div class="onboarding-content with-gradient">
                                                <form id="" action="{{route('admin.edit_item', ['id' => $rig->product_id])}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="">
                                                        <h5 class="form-header"> Edit product info</h5>
                                                        <fieldset class="form-group">
                                                            <label for="customSelect">Item Name</label>
                                                            <div class="input-group">
                                                                <div id="product_id_{{$rig->product_id}}">
                                                                </div>

                                                                <input type="text" name="edit_caption" oninput=""
                                                                       class="form-control" placeholder="Item name - caption product" required/>

                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="customSelect">Item Price</label>
                                                            <div class="input-group">
                                                                <input type="number" name="edit_price" oninput=""
                                                                       class="form-control" placeholder="Product Price" required/>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <label for="customSelect">Promo Code</label>
                                                            <div class="input-group">
                                                                <input type="text" name="edit_promo_code" oninput=""
                                                                       class="form-control" placeholder="Promo Code (optional)"/>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <label for="customSelect">Description</label>
                                                            <div class="input-group">
                                    <textarea type="text" name="edit_description" oninput=""
                                              class="form-control" placeholder="Enter description (optional)"></textarea>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <button class="btn btn-outline-success btn-md">Update Product</button>
                                                        </fieldset>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--------------------START - Chat Popup Box-------------------->
        </div>
    </div>

    <div aria-hidden="true" class="onboarding-modal modal fade animated"
         id="updateMiningProduct" role="dialog" tabindex="-1" data-backdrop="static"
         data-keyboard="false">
        <div class="modal-dialog modal-lg modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label"></span><span
                        class="os-icon os-icon-close"></span></button>
                <div class="onboarding-content with-gradient">
                    <form id="" action="{{route('admin.save_item')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">

                            <h5 class="form-header"> Add new mining product</h5>
                            <fieldset class="form-group">
                                <label for="customSelect">Item Name</label>
                                <div class="input-group">
                                    <input type="text" name="caption" oninput=""
                                           class="form-control" placeholder="Item name - caption product" required/>

                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Item Price</label>
                                <div class="input-group">
                                    <input type="number" name="price" oninput=""
                                           class="form-control" placeholder="Product Price" required/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Item thumbnail</label>
                                <div class="input-group">
                                    <input type="file" name="thumbnail" oninput="" required
                                           class="form-control" placeholder="Item Image"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Promo Code</label>
                                <div class="input-group">
                                    <input type="text" name="promo_code" oninput=""
                                           class="form-control" placeholder="Promo Code (optional)"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="customSelect">Description</label>
                                <div class="input-group">
                                    <textarea type="text" name="description" oninput=""
                                              class="form-control" placeholder="Enter description (optional)"></textarea>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <button class="btn btn-outline-success btn-md">Save Product</button>
                            </fieldset>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="edit_item_url" value="{{url('/api/mining/edit/')}}">
@endsection
@section('page_js')
    <script type="text/javascript">

        var edit_product_btn = $('#edit_product_btn');
        var itemSelector = function() {
            document.onclick = function(e) {
                if (e.target.tagName === 'BUTTON') {
                    var value = e.target.getAttribute("value");
                    var id = e.target.getAttribute("id");
                    if(value !== null) {
                        editItem(value, id);
                    }

                }
            }
        };
        itemSelector();

        function editItem(item_no, id) {
            console.log(item_no);
            $.ajax({
                url: $('[name=edit_item_url]').val()+'/'+item_no,
                type: 'GET',
                data: '',
                success: function(data){

                    $('[name=edit_caption]').val(data.product.caption);
                    $('[name=edit_price]').val(data.product.price);
                    $('[name=edit_description]').val(data.product.description);
                    $('#product_id_'+ data.product.product_id).html("<input type='hidden' name='product_id' value='"+data.product.product_id+"'/>");
                    $('[name=edit_promo_code]').html(data.product.promotion_code);
                    $('#'+item_no).click();

                    console.log(data);
                },
                error: function(e){
                    console.log(e);
                }
            });

        }
    </script>
    <script src="{{asset('appV1/admin/js/dataTables.bootstrap4.min.js')}}"></script>
@endsection


