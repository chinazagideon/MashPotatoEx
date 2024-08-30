@extends('appV1.layouts.front')
@section('page_title', 'Blog')
@section('content')
    <section class="vc_row py-5 d-flex flex-wrap align-items-center bg-cover"
             style="background-image:  linear-gradient(0deg, #0b256c, transparent 25%),radial-gradient(at 50% 330px, #0b0a6a, #211757);"></section>
    {{-- <div class="titlebar titlebar-sm scheme-light text-center bg-none liquid-parallax-bg" data-parallax="true"
          data-parallax-options="{ &quot;parallaxBG&quot;: true }"
          style="background-image: url(./assets/demo/bg/bg-31.jpg);">
         <div class="liquid-parallax-container">
             <figure class="liquid-parallax-figure"
                     style="height: 120%; background-image: url(&quot;http://avehtml.liquid-themes.com/assets/demo/bg/bg-31.jpg&quot;); background-position: 0% 0%; transform: translateY(-13.0556%);"></figure>
         </div>

         <div class="titlebar-inner">
             <div class="container titlebar-container">
                 <div class="row titlebar-container">
                     <div class="titlebar-col col-md-12">
                         <h1 data-fittext="true"
                             data-fittext-options="{ &quot;maxFontSize&quot;: 80, &quot;minFontSize&quot;: 32 }"
                             style="font-size: 80px;">Magazine</h1>
                         <a class="titlebar-scroll-link" href="#content" data-localscroll="true"><i
                                 class="fa fa-angle-down"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>--}}
    <br/>
    <br/>

    <section class="vc_row">
        <div class="container">
            <div class="row">
                <div class="lqd-column col-md-12">
                    <div class="liquid-blog-posts">
                        <div class="liquid-blog-grid row" data-liquid-masonry="true"
                             style="position: relative; height: 877.5px;">

                            @foreach($posts as $post)

                                <div class="lqd-column col-md-3 col-sm-6 masonry-item"
                                     style="position: absolute; left: 585px; top: 0px;">
                                    <article
                                        class="liquid-lp liquid-blog-item liquid-blog-contents-inside liquid-blog-item-square liquid-blog-scheme-light round h-450">
                                        <figure class="liquid-lp-media round loaded" data-responsive-bg="true"
                                                style="background-image: url({!! $post->image_1_url !!});">
                                            <a href="{{route('read', ['slug' => $post->slug])}}">
                                                <img src="{!! $post->image_1_url !!}" alt="">
                                            </a>
                                        </figure>
                                        <div class="liquid-blog-item-inner round">
                                            <a href="{{route('read', ['slug' => $post->slug])}}"
                                               class="liquid-overlay-link">{{strip_tags($post->caption)}}</a>
                                            <header class="liquid-lp-header mt-auto">
                                                <div class="liquid-lp-details">
                                                    <ul class="liquid-lp-category text-uppercase ltr-sp-175 font-weight-bold">
                                                        <li>
                                                            <a href="{{route('read', ['slug' => $post->slug])}}">{{$post->category}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h2 class="liquid-lp-title font-weight-bold h3 mb-0">
                                                    <a href="{{route('read', ['slug' => $post->slug])}}">{{strip_tags($post->caption)}}</a>
                                                </h2>
                                            </header>
                                        </div>
                                    </article>
                                </div>
                            @endforeach


                        </div>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
