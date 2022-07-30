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
                   <div class="yoast_breadcrumb hidden-xs"><span><span><a href="/">Trang chủ</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
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
                <div class="halim-movie-wrapper">
                   <div class="title-block">
                      <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                         <div class="halim-pulse-ring"></div>
                      </div>
                      <div class="title-wrapper" style="font-weight: bold;">
                         Bookmark
                      </div>
                   </div>
                   <div class="movie_info col-xs-12">
                      <div class="movie-poster col-md-3">
                         <img class="movie-thumb" src="{{asset('image/posts/'.$movie->image)}}" alt="GÓA PHỤ ĐEN">
                         @if ($movie->category->id!=17)
                           <div class="bwa-content">
                            <div class="loader"></div>
                            @if($movie->episode->count()!=0)
                            <a href="{{url('xem-phim/'.$movie->slug_movie.'/tap-'.$tap1->episode)}}" class="bwac-btn">
                            @endif
                              <i class="fa fa-play"></i>
                            </a>
                         </div>
                         @else
                         <button class="btn btn-primary trailer" style="width: 100%">Xem trailler</button>
                         @endif
                      </div>
                      <div class="film-poster col-md-9">
                         <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                         {{-- <h2 class="movie-title title-2" style="font-size: 12px;">Black Widow (2021)</h2> --}}
                         <ul class="list-info-group">
                            <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">@if ($movie->resolution==0)HD
                              @elseif($movie->resolution==1)SD
                              @elseif($movie->resolution==2)HDCam
                              @else 
                              Cam
                          @endif</span><span class="episode">@if ($movie->sub==0)Vietsub
                           @elseif($movie->sub==1)Lồng tiếng
                           @else
                           Engsub
                             
                         @endif</span></li>
                            <li class="list-info-group-item"><span>Số tập</span> : <span>@if ($movie->category_id==15||$movie->category_id==8) Phim lẻ
                                @else
                                {{$movie->episode->count()}}/{{$movie->fullepi}}
                            @endif</span></li>
                            <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->time}} Phút</li>
                            <li class="list-info-group-item"><span>Thể loại</span> : @foreach ($movie->movie_genre as $item)
                                
                            <a href="{{route('page.genre',$item->slug_genre)}}" rel="category tag">{{$item->title}}</a>.@endforeach</li>
                            <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('page.country',$movie->country->slug_country)}}" rel="tag">{{$movie->country->title}}</a></li>
                            <li class="list-info-group-item"><span>Năm</span> : <a href="{{route('page.year',$movie->year)}}">{{$movie->year}}</a></li>                           
                            <li class="list-info-group-item"><span>Lượt xem</span> : {{$movie->view}}</li>
                         
                           </ul>
                         <div class="movie-trailer hidden"></div>
                      </div>
                   </div>
                </div>
                <div class="clearfix"></div>
                <div id="halim_trailer"></div>
                <div class="clearfix"></div>
                @if($movie->trailer!=NULL)
                <div class="hidden" id="trailer">
                <div class="section-bar clearfix">
                  <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                       <article id="post-38424" class="item-content">
                        <iframe width="728" height="409" src="{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                       </article>
                        </article>
                     </div>
               </div>
               </div>
               @endif
                <div class="section-bar clearfix">
                   <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                </div>
                <div class="entry-content htmlwrap clearfix">
                   <div class="video-item halim-entry-box">
                        <article id="post-38424" class="item-content">
                         Phim <a href="{{route('page.movie',$movie->slug_movie)}}">{{$movie->title}}</a>
                         <p>{{$movie->description}}</p>
                        </article>
                   </div>
                </div>
                
                <div class="section-bar clearfix">
                  <h2 class="section-title"><span style="color:#ffed4d">Tags</span></h2>
               </div>
               <div class="entry-content htmlwrap clearfix">
                  <div class="video-item halim-entry-box">
                       <article id="post-38424" class="item-content">
                        @if ($movie->tags!=NULL)
                           @php
                           $tags = [];
                           $tags = explode(',',$movie->tags);
                           @endphp
                           @foreach ($tags as $item)
                               <a href="{{url('tag/'.\Str::slug($item))}}">{{$item}} - </a>
                           @endforeach
                        @else
                        {{$movie->title}}
                        @endif
                        

                       </article>
                  </div>
               </div>
             </div>
          </section>
          <section class="related-movies">
             <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                   <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                  @foreach ($movie_lienquan as $item)
                   <article class="thumb grid-item post-38498">
                      <div class="halim-item">
                         <a class="halim-thumb" href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                            <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$item->image)}}" alt="{{$item->title}}" title="{{$item->title}}"></figure>
                            <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
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
                   jQuery(document).ready(function($) {            
                   var owl = $('#halim_related_movies-2');
                   owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i style="padding: 0 5px" class="fa fa-chevron-left" aria-hidden="true"></i>', '<i style="padding: 0 5px" class="fa fa-chevron-right" aria-hidden="true"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
                </script>
             </div>
          </section>
       </main>
       <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
    </div>
 </div>
 <div class="clearfix"></div>
@endsection