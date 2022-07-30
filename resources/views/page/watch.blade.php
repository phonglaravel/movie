@extends('page.layout.master')
@section('content')
<div class="container">
    <div class="row fullwith-slider"></div>
 </div>
 <div class="container">
 <div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('page.category',$movie->category->slug_category)}}">{{$movie->category->title}}</a> » <span><a href="{{route('page.country',$movie->country->slug_country)}}">{{$movie->country->title}}</a> » <span><a href="{{route('page.movie',$movie->slug_movie)}}">{{$movie->title}}</a> »<span class="breadcrumb_last" aria-current="page">Tập {{$episode->episode}}</span></span></span></span></div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section id="content" class="test">
          <div class="clearfix wrap-content">
            {!! $episode->link !!}
               
               
             <div class="collapse" id="moretool">
                <ul class="nav nav-pills x-nav-justified">
                   <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                   <div class="fb-save" data-uri="" data-size="small"></div>
                </ul>
             </div>
             <div class="clearfix"></div>
             <div class="clearfix"></div>
             <div class="title-block">
                
                <div class="title-wrapper-xem full">
                   <h3 class="entry-title">{{$movie->title}} - Tập {{$episode->episode}}</h3>
                </div>
             </div>
             <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                <article id="post-37976" class="item-content post-37976"></article>
             </div>
             <div class="clearfix"></div>
             <div class="text-center">
                <div id="halim-ajax-list-server"></div>
             </div>
             <div id="halim-list-server">
                <ul class="nav nav-tabs" role="tablist">
                   <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i> 
                     @if ($movie->sub==0)
                     Vietsub
                     @elseif($movie->sub==1)
                     Lồng tiếng
                     @else
                     Engsub
                     @endif
                  </a></li>
                </ul>
                <div class="tab-content">
                   <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                      <div class="halim-server">
                         <ul class="halim-list-eps">
                           @foreach($movie->episode as $epi)
                           <a href="{{url('xem-phim/'.$movie->slug_movie.'/tap-'.$epi->episode)}}"><li class="halim-episode"><span class="halim-btn halim-btn-2 {{$episode->episode==$epi->episode?'active':''}} halim-info-1-1 box-shadow">{{$epi->episode}}</span></li>
                           </a>
                            @endforeach
                         </ul>
                         <div class="clearfix"></div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
             <div class="htmlwrap clearfix">
                <div id="lightout"></div>
             </div>
       </section>
       <section class="related-movies">
         <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
               <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
               @foreach($movie_lienquan as $item)
               <article class="thumb grid-item post-38494">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                        <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$item->image)}}" alt="{{$item->title}}" title="{{$item->title}}"></figure>
                           <span class="status">@if ($item->resolution==0)HD
                              @elseif($item->resolution==1)SD
                              @elseif($item->resolution==2)HDCam
                              @else 
                              Cam
                              @endif
                           </span>
                           <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>@if ($item->sub==0)
                              Vietsub
                              @elseif($item->sub==1)
                              Lồng tiếng
                              @else
                              Engsub
                              @endif
                              
                           </span> <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$item->title}}</p>
                              </div>
                           </div>
                     </a>
                  </div>
               </article>
               @endforeach
       
            </div>
            
       <script>
          jQuery(document).ready(function($) {            
          var owl = $('#halim_related_movies-2');
          owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i style="padding: 0 5px" class="fa fa-chevron-left" aria-hidden="true"></i>', '<i style="padding: 0 5px" class="fa fa-chevron-right" aria-hidden="true"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
       </script>
       </div>
       </section>
    </main>
    @include('page.layout.sidebar')
    </div>
 </div>
 <div class="clearfix"></div>
@endsection