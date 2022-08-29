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
        <!-- Nav pills -->
         <ul class="nav nav-pills">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#home">Ngày</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu1">Tuần</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu2">Tháng</a>
            </li>
         </ul>
         
         <!-- Tab panes -->
         <div class="tab-content">
            <div class="tab-pane active" id="home">
               <section class="tab-content">
                  <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                     <div class="halim-ajax-popular-post-loading hidden"></div>
                     <div id="halim-ajax-popular-post" class="popular-post">
                        @foreach ($topday as $item)
                        <div class="item post-37176">
                           <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                              <div class="item-link">
                                 <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                                 <span class="is_trailer">Trailer</span>
                              </div>
                              <p class="title">{{$item->title}}</p>
                           </a>
                           <div class="viewsCount" style="color: #9d9d9d;">{{$item->top_day}} lượt xem</div>
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
            </div>
            <div class="tab-pane  fade" id="menu1">
               <section class="tab-content">
                  <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                     <div class="halim-ajax-popular-post-loading hidden"></div>
                     <div id="halim-ajax-popular-post" class="popular-post">
                        @foreach ($topweek as $item)
                        <div class="item post-37176">
                           <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                              <div class="item-link">
                                 <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                                 <span class="is_trailer">Trailer</span>
                              </div>
                              <p class="title">{{$item->title}}</p>
                           </a>
                           <div class="viewsCount" style="color: #9d9d9d;">{{$item->top_week}} lượt xem</div>
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
            </div>
            <div class="tab-pane  fade" id="menu2">
               <section class="tab-content">
                  <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                     <div class="halim-ajax-popular-post-loading hidden"></div>
                     <div id="halim-ajax-popular-post" class="popular-post">
                        @foreach ($topmonth as $item)
                        <div class="item post-37176">
                           <a href="{{route('page.movie',$item->slug_movie)}}" title="{{$item->title}}">
                              <div class="item-link">
                                 <img src="{{asset('image/posts/'.$item->image)}}" class="lazy post-thumb" alt="{{$item->title}}" title="{{$item->title}}" />
                                 <span class="is_trailer">Trailer</span>
                              </div>
                              <p class="title">{{$item->title}}</p>
                           </a>
                           <div class="viewsCount" style="color: #9d9d9d;">{{$item->top_month}} lượt xem</div>
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
            </div>
         </div>
        
        <div class="clearfix"></div>
     </div>
 </aside>