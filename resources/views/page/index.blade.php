@extends('page.layout.master')
@section('content')
<div class="container">
    <div class="row fullwith-slider"></div>
 </div>
 <div class="container">
    <div class="row container" id="wrapper">
       <div class="halim-panel-filter">
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       <div class="col-xs-12 carausel-sliderWidget">
          <section id="halim-advanced-widget-4">
             <div class="section-heading">
                
                <span class="h-text">Phim Hot</span>
                
                <ul class="heading-nav pull-right hidden-xs">
                   <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Phim hot"></span></li>
                </ul>
             </div>
             <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                  @foreach ($hot_movie as $item)
                   <article class="thumb grid-item post-38498">
                      <div class="halim-item">
                         <a class="halim-thumb" href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                            <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$item->image)}}" alt="{{$item->title}}" title="{{$item->title}}"></figure>
                            <span class="status">@if ($item->resolution==0)HD
                                @elseif($item->resolution==1)SD
                                @elseif($item->resolution==2)HDCam
                                @else 
                                Cam
                            @endif</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>@if ($item->sub==0)Vietsub
                              @elseif($item->sub==1)Lồng tiếng
                              @else
                              Engsub
                                
                            @endif</span> 
                            <div class="icon_overlay"></div>
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
                   $(document).ready(function($) {            
                   var owl = $('#halim_related_movies-2');
                   owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<h2><i class="fa fa-chevron-left" aria-hidden="true"></i></h2>', '<h2><i class="fa fa-chevron-right" aria-hidden="true"></i></h2>'],responsiveClass: true,responsive: {0: {items:2},200: {items:3}, 400: {items:4},600: {items: 4},800: {items: 5},1000: {items: 6}}})});
                </script>
          </section>
          <div class="clearfix"></div>
       </div>
       
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
         <section id="halim-advanced-widget-2">
            <div class="section-heading">
               
               <span class="h-text">Phim Mới</span>
              
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
              @foreach ($new_movie->take(8) as $mov)
               <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('page.movie',$mov->slug_movie)}}">
                        <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$mov->image)}}" alt="" title=""></figure>
                        <span class="status">TẬP {{$mov->episode->count()}}/{{$mov->fullepi}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>@if ($mov->sub==0)Vietsub
                           @elseif($mov->sub==1)Lồng tiếng
                           @else
                           Engsub
                             
                         @endif</span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$mov->title}}</p>
                              <p class="original_title">My Roommate Is a Gumiho</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
               </div>
         </section>
         <div class="clearfix"></div>
         
          <section id="halim-advanced-widget-2">
             <div class="section-heading">
                <a href="{{route('page.category','phim-chieu-rap')}}" title="Phim chiếu rạp">
                <span class="h-text">Phim chiếu rạp</span>
                </a>
             </div>
             <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
               @foreach ($movie_rap as $mov)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('page.movie',$mov->slug_movie)}}">
                         <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$mov->image)}}" alt="" title=""></figure>
                         <span class="status">TẬP {{$mov->episode->count()}}/{{$mov->fullepi}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>@if ($mov->sub==0)Vietsub
                           @elseif($mov->sub==1)Lồng tiếng
                           @else
                           Engsub
                             
                         @endif</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">{{$mov->title}}</p>
                               
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                @endforeach
                </div>
          </section>
          <div class="clearfix"></div>
          <section id="halim-advanced-widget-2">
            <div class="section-heading">
               <a href="{{route('page.category','phim-le')}}" title="Phim lẻ">
               <span class="h-text">Phim lẻ</span>
               </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
              @foreach ($movie_le as $mov)
               <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('page.movie',$mov->slug_movie)}}">
                        <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$mov->image)}}" alt="" title=""></figure>
                        <span class="status">TẬP {{$mov->episode->count()}}/{{$mov->fullepi}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>@if ($mov->sub==0)Vietsub
                          @elseif($mov->sub==1)Lồng tiếng
                          @else
                          Engsub
                            
                        @endif</span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$mov->title}}</p>
                              
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
               </div>
         </section>
         <div class="clearfix"></div>
         <section id="halim-advanced-widget-2">
            <div class="section-heading">
               <a href="{{route('page.category','phim-bo')}}" title="Phim bộ">
               <span class="h-text">Phim bộ</span>
               </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
              @foreach ($movie_bo as $mov)
               <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('page.movie',$mov->slug_movie)}}">
                        <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$mov->image)}}" alt="" title=""></figure>
                        <span class="status">TẬP {{$mov->episode->count()}}/{{$mov->fullepi}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>@if ($mov->sub==0)Vietsub
                          @elseif($mov->sub==1)Lồng tiếng
                          @else
                          Engsub
                            
                        @endif</span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$mov->title}}</p>
                              
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
               @endforeach
               </div>
         </section>
         <div class="clearfix"></div>
          
       </main>
       
       @include('page.layout.sidebar')
    </div>
 </div>
 <div class="clearfix"></div>
@endsection