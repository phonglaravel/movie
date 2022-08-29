<header id="header">
    <div class="container">
       <div class="row" id="headwrap">
         
          <div class="col-md-3 col-sm-6 slogan">
            
          </div>
          <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
             <div class="header-nav">
                <div class="col-xs-12">
                   <form id="search-form-pc" name="tukhoa" role="search" action="{{route('page.search')}}" method="GET">
                      <div class="form-group">
                         <div class="input-group col-xs-12"> 
                            <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm..." >
                            <i class="animate-spin hl-spin4 hidden"></i>
                           </div>
                      </div>
                   </form>
                   <ul class="ui-autocomplete ajax-results hidden"></ul>
                  
                </div>
               
             </div>
          </div>
          
       </div>
    </div>
</header>
<div class="navbar-container">
   <div class="container">
      <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
          <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
             <span class="sr-only">Menu</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             </button>
             <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
             <span class="hl-search" aria-hidden="true"></span>
             </button>
             
          </div>
          <div class="collapse navbar-collapse" id="halim">
             <div class="menu-menu_1-container">
                <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                   <li class="current-menu-item active"><a title="Trang Chủ" href="/">Trang Chủ</a></li>
                   
                   {{-- <li class="mega dropdown">
                      <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                      <ul role="menu" class=" dropdown-menu">
                         <li><a title="Phim 2020" href="danhmuc.php">Phim 2020</a></li>
                         <li><a title="Năm 2019" href="danhmuc.php">Năm 2019</a></li>
                         <li><a title="Năm 2018" href="danhmuc.php">Năm 2018</a></li>
                      </ul>
                   </li> --}}
                   {{-- <li class="mega dropdown">
                     <a title="Danh mục" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Danh mục<span class="caret"></span></a>
                     <ul role="menu" class=" dropdown-menu">
                       @foreach($categories as $cate)
                        <li><a href="{{route('page.category',$cate->slug_category)}}">{{$cate->title}}</a></li>
                       @endforeach
                     </ul>
                  </li> --}}
                   <li class="mega dropdown">
                      <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                      <ul role="menu" class=" dropdown-menu">
                        @foreach($genres as $genre)
                         <li><a href="{{route('page.genre',$genre->slug_genre)}}">{{$genre->title}}</a></li>
                        @endforeach
                      </ul>
                   </li>
                   <li class="mega dropdown">
                     <a title="Năm" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm <span class="caret"></span></a>
                     <ul role="menu" class=" dropdown-menu">
                       @for($year=2000;$year<=2022;$year++)
                       <li><a title="{{$year}}" href="{{route('page.year',$year)}}">{{$year}}</a></li>
                       @endfor 
                     </ul>
                  </li>
                   <li class="mega dropdown">
                      <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                      <ul role="menu" class=" dropdown-menu">
                        @foreach ($countries as $item)
                        <li><a title="Việt nam" href="{{route('page.country',$item->slug_country)}}">{{$item->title}}</a></li>
                        @endforeach   
                      </ul>
                   </li>
                   @foreach ($categories as $cate)
                   <li><a title="Phim Lẻ" href="{{route('page.category',$cate->slug_category)}}">{{$cate->title}}</a></li>
                   @endforeach
                   
                   
                </ul>
             </div>
             
          </div>
       </nav>
       <div class="collapse navbar-collapse" id="search-form">
          <div id="mobile-search-form" class="halim-search-form"></div>
       </div>
       <div class="collapse navbar-collapse" id="user-info">
          <div id="mobile-user-login"></div>
       </div>
    </div>
 </div>
</div>