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
                   <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">Trang chủ</a> » <span class="breadcrumb_last" aria-current="page">{{$tag}}</span></span></span></div>
                </div>
             </div>
          </div>
          <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
             <div class="ajax"></div>
          </div>
       </div>
       <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
          <section>
             <div class="section-bar clearfix">
                <h1 class="section-title"><span>{{$tag}}</span></h1>
             </div>
             <div class="halim_box">
               @foreach ($movie as $i)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                   <div class="halim-item">
                      <a class="halim-thumb" href="{{route('page.movie',$i->slug_movie)}}" title="{{$i->title}}">
                         <figure><img class="lazy img-responsive" src="{{asset('image/posts/'.$i->image)}}" alt="{{$i->title}}" title="{{$i->title}}"></figure>
                         <span class="status">?/{{$i->fullepi}}</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">{{$i->title}}</p>
                               {{-- <p class="original_title">The Mire Season 1</p> --}}
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                @endforeach
             </div>
             <nav> {{ $movie->links() }} </nav>
             <div class="clearfix"></div>
             
          </section>
       </main>
       @include('page.layout.sidebar')
    </div>
 </div>
 <div class="clearfix"></div>
@endsection