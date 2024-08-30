@extends('appV1.layouts.front')
@section('page_title', $post->caption)
@section('content')
    <main id="content" class="content py-0">
        <div class="blog-single-cover scheme-light" data-fullheight="true" data-inview="true"
             data-inview-options='{ "onImagesLoaded": true }' style="background-color: #666871;">
            <figure class="blog-single-media" data-responsive-bg="true" data-parallax="true"
                    data-parallax-options='{ "parallaxBG": true, "triggerHook": "onLeave" }'
                    data-parallax-from='{ "translateY": "0%" }' data-parallax-to='{ "translateY": "20%" }'>
                <img src="{{!empty($post->cover) ? $post->cover : $post->image_1_url}}" alt="Blog single">
            </figure>
            <div class="blog-single-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <header class="entry-header blog-single-header" data-parallax="true"
                                    data-parallax-to='{ "opacity": 0, "translateY": "30%" }'
                                    data-parallax-options='{ "triggerHook": "0.3" }'>
                                <h1 class="blog-single-title entry-title h2" data-split-text="true"
                                    data-split-options='{ "type": "lines" }'>{{$post->caption}}</h1>
                                <div class="post-meta">
<span class="byline">
<span class="block text-uppercase ltr-sp-1">Source:</span>
<span class="author vcard">
<a class="url fn n" href="#">{{$post->provider}}</a>
</span>
</span>
                                    <span class="posted-on">
<span class="block text-uppercase ltr-sp-1">Published on:</span>
<a href="#" rel="bookmark">
<time class="entry-date published updated" datetime="2018-03-13T09:25:41+00:00">{{$post->pubDate}}</time>
</a>
</span>
                                    <span class="cat-links">
<span class="block text-uppercase ltr-sp-1">Published in:</span>
<a href="#" rel="category tag">Business</a>
</span>
                                </div>
                                @if($post->has_video)
                                    <div class="blog-single-details-extra">
                                        <a href="https://www.youtube.com/watch?v=YJ5q8Wrkbdw"
                                           class="lightbox-link fresco">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" stroke="#000"
                                                 stroke-width="1px" width="71.5px" height="71.5px">
                                                <path fill-rule="evenodd" stroke-linecap="butt" stroke-linejoin="miter"
                                                      d="M35.500,0.500 C54.830,0.500 70.500,16.170 70.500,35.500 C70.500,54.830 54.830,70.500 35.500,70.500 C16.170,70.500 0.500,54.830 0.500,35.500 C0.500,16.170 16.170,0.500 35.500,0.500 Z"/>
                                                <path fill-rule="evenodd" stroke-linecap="butt" stroke-linejoin="miter"
                                                      d="M49.410,35.676 L28.165,47.942 L28.165,23.410 L49.410,35.676 Z"/>
                                            </svg>
                                            <span class="text-uppercase ltr-sp-1">Play Video</span>
                                        </a>
                                    </div>
                                @endif
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article class="blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="blog-single-content entry-content pull-up expanded">
                            {!! nl2br($post->description) !!}
                            <br/>
                            <a href="{{$post->post_url}}" target="_blank"
                               class="btn btn-default text-uppercase btn-md circle btn-bordered border-thin font-size-12 lh-15 font-weight-bold ltr-sp-05 mb-2">
<span>
<span class="btn-txt">Read From Source</span>
</span>
                            </a>

                            <footer class="blog-single-footer entry-footer">
<span class="tags-links">
<a href="#" rel="tag">Granada</a>
<a href="#" rel="tag">Spain</a>
<a href="#" rel="tag">Travel</a>
</span>
                                <span class="share-links">
<span class="text-uppercase ltr-sp-1">Share On</span>
<ul class="social-icon circle branded social-icon-sm">
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
</ul>
</span>
                            </footer>

                            <nav class="post-nav">
                                @if(!empty($prv_post))
                                    <div class="nav-previous">
                                        <a href="{{route('read', ['slug'=> $prv_post->slug])}}" rel="prev">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" stroke="#444"
                                                 stroke-width="2" x="0px" y="0px" viewBox="0 0 24 24"
                                                 xml:space="preserve"
                                                 width="24" height="24">
<g>
    <line stroke-miterlimit="10" x1="22" y1="12" x2="2" y2="12" stroke-linejoin="miter" stroke-linecap="butt"></line>
    <polyline stroke-linecap="square" stroke-miterlimit="10" points="9,19 2,12 9,5 " stroke-linejoin="miter"></polyline>
</g>
</svg>
                                            <span class="screen-reader-text">Previous Article</span>
                                            <span aria-hidden="true" class="nav-subtitle">Previous Article</span>
                                            <span class="nav-title">{{$prv_post->caption}}</span>
                                        </a>
                                    </div>
                                @endif
                                @if(!empty($next_post))
                                    <div class="nav-next">
                                        <a href="{{route('read', ['slug' => $next_post->slug])}}" rel="next">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" fill="none" stroke="#444"
                                                 stroke-width="2" x="0px" y="0px" viewBox="0 0 24 24"
                                                 xml:space="preserve"
                                                 width="24" height="24">
<g transform="rotate(180 12,12) ">
    <line stroke-miterlimit="10" x1="22" y1="12" x2="2" y2="12" stroke-linejoin="miter" stroke-linecap="butt"></line>
    <polyline stroke-linecap="square" stroke-miterlimit="10" points="9,19 2,12 9,5 " stroke-linejoin="miter"></polyline>
</g>
</svg>
                                            <span class="screen-reader-text">Next Article</span>
                                            <span aria-hidden="true" class="nav-subtitle">Next Article</span>
                                            <span class="nav-title">{{$next_post->caption}}</span>
                                        </a>
                                    </div>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </main>
@endsection
