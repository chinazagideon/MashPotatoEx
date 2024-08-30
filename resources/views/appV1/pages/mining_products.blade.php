@extends('appV1.layouts.front')
@section('page_title', 'Mining Products')
@section('content')

    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>

    <section class="vc_row pt-150 pb-75">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center mb-5 ca-initvalues-applied lqd-animations-done"
                 data-custom-animations="true"
                 data-ca-options="{&quot;triggerHandler&quot;:&quot;inview&quot;,&quot;animationTarget&quot;:&quot;.split-inner&quot;,&quot;duration&quot;:700,&quot;startDelay&quot;:&quot;180&quot;,&quot;delay&quot;:100,&quot;easing&quot;:&quot;easeOutQuint&quot;,&quot;direction&quot;:&quot;forward&quot;,&quot;initValues&quot;:{&quot;translateY&quot;:50,&quot;opacity&quot;:0},&quot;animations&quot;:{&quot;translateY&quot;:0,&quot;opacity&quot;:1}}">
                <div class="lqd-column col-lg-5">
                    <header class="fancy-title mb-40">
                        <h6 class="font-size-13 text-uppercase ltr-sp-05">Mining Hardwares</h6>
                        <h2 class="mt-4 pr-lg-6 split-text-applied" data-split-text="true"
                            data-split-options="{&quot;type&quot;: &quot;lines&quot;}" style="">
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="Having attractive " class="split-inner"><span class="split-txt">Your mining rig at the fingertip </span></span>
                            </div>
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="showcase has " class="split-inner"><span
                                        class="split-txt">showcase has </span></span></div>
                            <div class="lqd-lines split-unit lqd-unit-animation-done"
                                 style="display: block; text-align: start; position: relative;"><span
                                    data-text="never been easier" class="split-inner"><span class="split-txt">never been <span
                                            class="text-secondary">easier</span></span></span></div>
                        </h2>
                    </header>
                </div>
            </div>
            <div class="row" id="cartItemAdded">
                <div class="lqd-column col-md-12">
                    <div class="liquid-portfolio-list">
                        <span id="cartNotify"></span>
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
                        <div class="row liquid-portfolio-list-row" data-liquid-masonry="true"
                             data-masonry-options="{ &quot;filtersID&quot;: &quot;#pf-grid-1&quot; }"
                             style="position: relative; height: 1047.19px;">
                            @php

                            $count = 1;

                                @endphp
                            @foreach($products as $item)
                            <div class="lqd-column col-lg-4 col-sm-6 px-4 masonry-item brand"
                                 style="position: absolute; left: 0px; top: 0px;">
                                <div
                                    class="ld-pf-item ld-pf-dark pf-details-visible pf-bg-hidden title-size-30 pf-hover-shadow pf-hover-shadow-alt">
                                    <div class="ld-pf-inner">
                                        <div class="ld-pf-image">
                                            <figure>
                                                <img src="{{asset('storage/miner/'.$item->image_url)}}"
                                                     alt="{{$item->caption}}">
                                            </figure>
                                            <div class="ld-pf-bg bg-gradient-primary-lr opacity-09">
                                                <a href="#"
                                                   class="btn btn-xsm btn-naked text-uppercase font-weight-bold text-white">
<span>
<span class="btn-txt">{{$item->caption}}</span>
</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ld-pf-details pl-0 py-3">
                                            <div class="ld-pf-details-inner">
                                                <h3 class="ld-pf-title h4">{{$item->caption}}</h3>
                                                <div class="ld-pf-category size-md">
                                                    <a href="#">${{number_format($item->price, 2)}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="product_{{$count}}" value="{{$item->product_id}}"  class="btn btn-default text-uppercase btn-md btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2" style="padding: 10px">
Add to Cart
                                    </button>
                                    <a href="{{route('checkout')}}" class="btn btn-default text-uppercase btn-md btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">View Cart</span>
</span>
                                    </a>
                                </div>
                            </div>
                                @php
                                 $count ++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="{{$count}}" id="count">
    <input type="hidden" value="{{url('/')}}" name="base_url"/>
    <span id="prod_id"></span>


@endsection
@section('page_js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var getImageName = function() {
            document.onclick = function(e) {
                if (e.target.tagName == 'BUTTON') {
                    var value = e.target.getAttribute("value");
                    var id = e.target.getAttribute("id");
                    var data = [];
                     data += id+":" +value+",";
                     var session_id = $('[name=session_id]').val();


                     $.ajax({
                         url: $('[name=base_url]').val()+"/api/cart",
                         data: "product_id="+value+"&key="+id+"&session_id="+session_id,
                         type: "POST",
                         success: function (data) {
                             $("#prod_id").html("<input type='hidden' name='session_id' value='"+data.session_key+"'/>");
                             // $("#"+id).hide();

                             $('#cartNotify').html("<div id=\"\" class=\"lqd-column col-md-12\">\n" +
                                 "                            <div class=\"iconbox iconbox-shadow-hover iconbox-filled bg-swans-down\">\n" +
                                 "                                <div class=\"iconbox-icon-wrap\">\n" +
                                 "<span class=\"iconbox-icon-container text-turquoise\">\n" +
                                 "<i class=\"icon-arrows_check\"></i>\n" +
                                 "</span>\n" +
                                 "                                </div>\n" +
                                 "                                <div class=\"contents\">\n" +
                                 "                                    <h3 class=\"font-weight-bold text-turquoise\">Item Added to Cart</h3>\n" +
                                 "                                    <p></p>\n" +
                                 "\n" +
                                 "                                </div>\n" +
                                 "                            </div>\n" +
                                 "                        </div>");
                             $('html, body').animate({
                                 scrollTop: $("#cartItemAdded").offset().top
                             }, 2000);

                         },
                         error:function(e){
                             console.log(e);
                         },
                     });

                    console.log($('#count').val());
                }
            }
        };
        getImageName();

        function addToCart() {

        }
    </script>
@endsection
