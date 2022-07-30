<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
       <div class="section-bar clearfix">
          <div class="section-title">
             <a href="{{url('/danh-muc/trailer')}}"><span>Phim Sắp Chiếu</span></a>
          </div>
       </div>
       <section class="tab-content">
          <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
             <div class="halim-ajax-popular-post-loading hidden"></div>
             <div id="halim-ajax-popular-post" class="popular-post">
                @foreach ($trailer as $item)
                <div class="item post-37176">
                   <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                      <div class="item-link">
                         <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                         <span class="is_trailer">Trailer</span>
                      </div>
                      <p class="title">{{$item->title}}</p>
                   </a>
                   <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                   <div style="float: left;">
                      <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                      <span style="width: 0%"></span>
                      </span>
                   </div>
                </div>
                @endforeach
             </div>
          </div>
       </section>
       <div class="clearfix"></div>
    </div>
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
           <div class="section-title">
              <span>Top Views</span>
              
           </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#day" role="tab" aria-controls="home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#week" role="tab" aria-controls="profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#month" role="tab" aria-controls="contact" aria-selected="false">Tháng</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="day" role="tabpanel" aria-labelledby="home-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                {{-- <div class="item post-37176">
                    <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                       <div class="item-link">
                          <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                          <span class="is_trailer">Trailer</span>
                       </div>
                       <p class="title">{{$item->title}}</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                    <div style="float: left;">
                       <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                       <span style="width: 0%"></span>
                       </span>
                    </div>
                </div> --}}
                </div>
            </div>
            
            <div class="tab-pane fade" id="week" role="tabpanel" aria-labelledby="profile-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    {{-- <div class="item post-37176">
                        <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                           <div class="item-link">
                              <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">{{$item->title}}</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="contact-tab">
                <div id="halim-ajax-popular-post" class="popular-post">
                    {{-- <div class="item post-37176">
                        <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                           <div class="item-link">
                              <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                              <span class="is_trailer">Trailer</span>
                           </div>
                           <p class="title">{{$item->title}}</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                           <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                           <span style="width: 0%"></span>
                           </span>
                        </div>
                    </div> --}}
                </div>
            </div>
          </div>
        <div class="clearfix"></div>
     </div>
 </aside>