@extends('appV1.layouts.app')
@section('page_title', 'Mining Request')
@section('content')
    <main id="content" class="content">
        <div class="pf-single-contents">
            <section class="vc_row">
                <header class="pf-single-header py-5" style="padding-bottom: 0 !important;">
                    <div class="container">
                        <div class="row d-lg-flex align-items-end pt-3 pb-5">
                            <div class="col-lg-12 col-md-12 mb-lg-0 mb-5">
                                <ul class="pf-single-cat my-0 text-uppercase ltr-sp-1 reset-ul comma-sep-li">
                                    <li>Order Item</li>
                                </ul>
                                <h2 class="pf-single-title size-xl my-0 font-weight-bold" data-fittext="true"
                                    data-fittext-options='{ "maxFontSize": "currentFontSize", "compressor": 0.7 }'>Cart
                                    Items</h2>
                                <h4 class="my-0 mt-2">Mining Equipments</h4>
                            </div>

                        </div>
                    </div>
                </header>
            </section>

            <section class="vc_row pb-55">
                <div class="container">
                    <div class="row d-flex flex-wrap">
                        <div class="lqd-column col-xs-12 col-md-6">
                            @if(!empty(session('status')))
                                <div class="lqd-column col-md-12">
                                    <div class="iconbox iconbox-shadow-hover iconbox-filled bg-swans-down">
                                        <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container text-turquoise">
<i class="icon-arrows_check"></i>
</span>
                                        </div>
                                        <div class="contents">
                                            <h3 class="font-weight-bold text-turquoise">{{session('status')}}</h3>
                                            <p></p>

                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="lqd-column col-md-12">
                                    <div class="fancy-box fancy-box-offer fancy-box-offer-header">
                                        <div class="fancy-box-cell fancy-box-header">
                                            <h3>Item</h3>
                                        </div>

                                        <div class="fancy-box-cell">
                                            <p>Price</p>
                                        </div>

                                        <div class="fancy-box-cell">
                                            <p>Action</p>
                                        </div>
                                    </div>
                                    @php
                                        $sum_amount= 0;
                                    $count =0;
                                    @endphp
                                    @foreach($cart_item as $item)

                                        @php
                                            $mining_items = \App\Mining::where('product_id', $item->item_no)->first();
                                        $sum_amount += $mining_items->price;
                                        $count ++;
                                        @endphp
                                        <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                                            <div class="fancy-box-cell fancy-box-header">
                                                <figure class="fancy-box-image">
                                                    <img
                                                        src="{{asset('appV1/assets/img/miner/'.$mining_items->image_url)}}"
                                                        alt="{{$mining_items->caption}}">
                                                </figure>
                                                <h3>
                                                    {{$mining_items->caption}}
                                                    <small>{{$mining_items->description}}</small>
                                                </h3>
                                            </div>

                                            <div class="fancy-box-cell" data-text="Price">
                                                <h5>
                                                    ${{number_format($mining_items->price)}}
                                                </h5>
                                            </div>

                                            <div class="fancy-box-cell" data-text="Action">
                                                <a href="{{route('remove_item', ['id' => $item->counter, 'session_id' => $session_id])}}"
                                                   class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Remove</span>
</span>
                                                </a>
                                            </div>
                                        </div>

                                    @endforeach
                                    <div class="fancy-box fancy-box-offer fancy-box-heading-sm">
                                        <div class="fancy-box-cell fancy-box-header">

                                            <h3>
                                               Total Amount
                                                <small>Cart size</small>
                                            </h3>
                                        </div>
                                        <div class="fancy-box-cell" data-text="No of Items">
                                            <h5>
                                                {{$count}}
                                                <small>No of Items</small>
                                            </h5>
                                        </div>
                                        <div class="fancy-box-cell" data-text="Total Amount">
                                            <h5>
                                                ${{number_format($sum_amount)}}
                                                <small>VAT included</small>
                                            </h5>
                                        </div>


                                    </div>

                                    <a href="{{route('mining')}}"
                                       class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Continue Shopping</span>
</span>
                                    </a>
                                    <a href="{{route('clear_cart', ['session_id' => $session_id])}}"
                                       class="btn btn-md btn-bordered wide text-uppercase font-weight-bold lh-125">
<span>
<span class="btn-txt">Clear Cart</span>
</span>
                                    </a>
                                    <br/>

                                </div>
                            </div>

                            <div class="lqd-column col-md-12 mt-50">
                                <div class="iconbox iconbox-shadow-hover iconbox-filled bg-link-water">
                                    <div class="iconbox-icon-wrap">
<span class="iconbox-icon-container text-havelock-blue">
<i class="icon-basic_server"></i>
</span>
                                    </div>
                                    <div class="contents">
                                        <h3 class="font-weight-bold text-havelock-blue">Mining Equipment Installation
                                            Service</h3>
                                        <p>We also setup mining farms upto ready to use level, contact us
                                            via {{config('app.email')}} </p>
                                            <p>Contact us for specifications and support.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lqd-column col-xs-12 col-md-6 pl-md-7 text-md-right" data-custom-animations="true"
                             data-ca-options='{ "triggerHandler": "inview", "animationTarget": "all-childs", "duration": 650, "delay": 70, "initValues": { "translateY": 100, "opacity": 0 }, "animations": { "translateY": 0, "opacity": 1 } }'>
                            <h2 class="font-size-30 mt-0 mb-15"><span class="font-size-2x">Shipping Information</span></h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lqd-column">
                                        <div
                                            class="contact-form contact-form-inputs-underlined contact-form-button-circle">
                                            <div class="contact-form-result hidden"></div>
                                            <br/>
                                            <br/>
                                            <form action="{{route('complete_order')}}" method="post">
                                                @csrf
                                                <div class="row d-flex flex-wrap">
                                                    <h4 class="color-primary">Personal Information</h4>

                                                    <div class="lqd-column col-md-12 mb-20">

                                                        <input class="lh-25 mb-30" type="text" name="name"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Enter Full Name" required autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>


                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <input class="lh-25 mb-30" type="email" name="email"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Your email address" required>
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <input class="lh-25 mb-30" type="number" name="phone"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Enter your phone number" required>
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="zipcode"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Enter your zipcode" required>
                                                        @error('zipcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="address"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Address Line" required>
                                                        @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>

                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="state"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="State" required>
                                                        @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <select class="lh-25 mb-30" name="country">
                                                            <option>Please select</option>
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>


                                                    <h4>Delivery Information</h4>
                                                    <br/>
                                                    <br/>
                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="delivery_name"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Full Name" required>
                                                        @error('delivery_name')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror

                                                    </div>

                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <input class="lh-25 mb-30" type="email" name="delivery_email"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Enter email address" required>
                                                        @error('delivery_email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <input class="lh-25 mb-30" type="number" name="delivery_phone"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Enter phone number" required>
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="delivery_zipcode"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Enter your zipcode" required>
                                                        @error('delivery_zipcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="delivery_address"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Address Line" required>
                                                        @error('delivery_address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="delivery_state"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="State" required>
                                                        @error('delivery_state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-6 mb-20">
                                                        <select class="lh-25 mb-30" name="delivery_country">
                                                            <option>Please select</option>
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>


                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <h4 class="color-primary">Complete Order</h4>
                                                    </div>
                                                    
                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <input class="lh-25 mb-30" type="text" name="discount"
                                                               aria-required="true" aria-invalid="false"
                                                               placeholder="Discount Code">
                                                        @error('discount')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror

                                                    </div>
                                                    <div class="lqd-column col-md-12 mb-20">
                                                        <h5>Payment Method</h5>
                                                        <select class="lh-25 mb-30" name="method">
                                                            <option>Please select</option>
                                                            <option value="BTC">Bitcoin</option>
                                                            <option value="ETH">Etheruem</option>

                                                        </select>

                                                        @error('method')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror

                                                    </div>
                                                                                                        <input type="hidden" name="cart_id"
                                                                                                               value="{{$session_id}}"/>
                                                    {{--                                                    <input type="hidden" name="product_id"--}}
                                                    {{--                                                           value="{{$item->product_id}}">--}}

                                                    <div class="lqd-column col-md-12 text-md-right">
                                                        <a href="{{route('mining')}}" class="ltr-sp-1">Go Back</a>

                                                        <input type="submit" value="Place Order"
                                                               class="font-size-13 ltr-sp-1 font-weight-bold">

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </main>
@endsection

@section('page_css')

    <link rel="stylesheet" href="{{asset('appV1/assets/css/themes/original.css')}}"/>
@endsection
