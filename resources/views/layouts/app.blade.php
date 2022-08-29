<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <a class="navbar-brand" href="{{url('/admincp')}}">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('category.create')}}">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('genre.create')}}">Thể loại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('country.create')}}">Quốc gia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('movie.index')}}">Phim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('episode.create')}}">Tập phim</a>
                </li>
                {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li> --}}
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
              <li class="nav-item dropdown" style="list-style: none">
                <a id="nav-link dropdown-toggle" class="nav-link dropdown-toggle" href="#" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    {{ Auth::user()->name }}
                </a>
    
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            </div>
        </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#tablemovie').DataTable();
        $("#btn").click(function(){
          $(".danhsach").toggle();
        });
      });
  </script>
  
    <script type="text/javascript">
        $('.hotmovie').change(function(){
            const hot = $(this).val();
            
            const movie_id = $(this).data('movie_id');
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
            url : "{{url('/hot')}}",
            method: "POST",
            data : {hot:hot,movie_id:movie_id ,_token:_token},
            success:function(data)
            {
                alert ('thanhcong');
            }
            });
            })
            
    </script>
    <script type="text/javascript">
      $('.neww').change(function(){
          const neww = $(this).val();
          
          const movie_id = $(this).data('movie_id');
          // alert(neww);
          var _token = $('input[name="_token"]').val();
          
          $.ajax({
          url : "{{url('/new')}}",
          method: "POST",
          data : {new:neww,movie_id:movie_id ,_token:_token},
          success:function(data)
          {
              alert ('thanhcong');
          }
          });
          })
          
  </script>
  <script type="text/javascript">
    $('.yearmovie').change(function(){
        const year = $(this).val(); 
        const movie_id = $(this).attr('id');
        // alert(neww);
        var _token = $('input[name="_token"]').val();
        
        $.ajax({
        url : "{{url('/year')}}",
        method: "POST",
        data : {year:year,movie_id:movie_id ,_token:_token},
        success:function(data)
        {
            alert ('thanhcong');
        }
        });
        })
        
</script>
<script>
  $(document).ready(function () {
	$('#select_movie').selectpicker();

});

</script>
<script>
  const weekdays = ['CN', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];

  /*clock settings*/
  let clock = setTimeout(function clockSet() {
  const today = new Date(); //fetching date

  // date options
  let y = today.getFullYear();
  let mo = (today.getMonth() + 1);
  let d = today.getDate();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  let am = ''; // am:pm empty string

  let day = weekdays[today.getDay()]; // turning number to weekdays. 


  //make douple digits
  mo = checkTime(mo);
  d = checkTime(d);
  h = checkTime(h);
  m = checkTime(m);
  s = checkTime(s);

  function checkTime(i) {
  if (i < 10) {
    i = '0' + i;
  }
  return i;
  }

  const time = h + ':' + m + ':' + s; //full time
  const date = d + '/' + mo + '/' + y;
  document.getElementById('time').textContent = time; //fill time

  document.getElementById('day').textContent = " "+day; 
  document.getElementById('date').textContent = " "+date; 


  clock = setTimeout(clockSet, 1000); //nest setTimeOut 
  }, 1000) //repeat every second
</script>
    
  
  
    
</body>
</html>
