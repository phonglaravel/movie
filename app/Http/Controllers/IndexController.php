<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\MonthView;
use App\Models\Movie;
use App\Models\Movie_category;
use App\Models\Movie_genre;
use App\Models\View;
use App\Models\WeekView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    public function index()
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $movie_rap = Movie::orderBy('id','DESC')->where('category_id',8)->take(8)->get();
        $movie_le = Movie::orderBy('id','DESC')->where('category_id',15)->take(8)->get();
        $movie_bo = Movie::orderBy('id','DESC')->where('category_id',16)->take(8)->get();
        $hot_movie = Movie::orderBy('id','DESC')->where('hot',1)->take(10)->get();
        $new_movie = Movie::orderBy('id','DESC')->where('new',1)->take(8)->get();
        return view('page.index',
        compact('genres','countries','categories',
        'hot_movie','new_movie','trailer','movie_le','movie_bo','movie_rap','topday','topweek','topmonth'));
    }
    public function category($slug)
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $category = Category::where('slug_category',$slug)->first();
        $movie_category = Movie_category::where('category_id',$category->id)->get();
        $arrcate = [];
        foreach($movie_category as $item){
            $arrcate[]= $item->movie_id;
        }
        $movie = Movie::orderBy('id', 'DESC')->whereIn('id',$arrcate)->paginate(20);
        return view('page.category',compact('genres','countries','categories','category','movie','trailer','topday','topweek','topmonth'));
    }
    public function genre($slug)
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $genre = Genre::where('slug_genre',$slug)->first();
        $movie_genre = Movie_genre::where('genre_id',$genre->id)->get();
        $arrcate1 = [];
        foreach($movie_genre as $item){
            $arrcate1[]= $item->movie_id;
        }
        $movie = Movie::orderBy('id', 'DESC')->whereIn('id',$arrcate1)->paginate(20);
        return view('page.genre',compact('genres','countries','categories','genre','movie','trailer','topday','topweek','topmonth'));
    }
    public function country($slug)
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $country = Country::where('slug_country',$slug)->first();
        $movie = Movie::orderBy('id', 'DESC')->where('country_id',$country->id)->paginate(20);
        return view('page.country',compact('genres','countries','categories','country','movie','trailer','topday','topweek','topmonth'));
    }
    public function movie($slug)
    {
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $movie = Movie::with('movie_genre')->where('slug_movie',$slug)->first();
        $today = Carbon::now('Asia/Ho_Chi_minh');
        $day = View::where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))->where('movie_id',$movie->id)->first();
        if($day==null){
            $v = new View();
            $v->time = Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y');
            $v->movie_id = $movie->id;
            $v->view = 1;
            $v->save();
        }else{
            $day->view =  $day->view +1;
            $day->save();
        }
        $week = WeekView::where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))->where('movie_id',$movie->id)->first();
        if($week==null){
            $v = new WeekView();
            $v->week = Carbon::now('Asia/Ho_Chi_minh')->weekOfYear;
            $v->year = Carbon::now('Asia/Ho_Chi_minh')->format('Y');
            $v->movie_id = $movie->id;
            $v->view = 1;
            $v->save();
        }else{
            $week->view =  $week->view +1;
            $week->save();
        }
        $month = MonthView::where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))->where('movie_id',$movie->id)->first();
        if($month==null){
            $v = new MonthView();
            $v->month = Carbon::now('Asia/Ho_Chi_minh')->format('m');
            $v->year = Carbon::now('Asia/Ho_Chi_minh')->format('Y');
            $v->movie_id = $movie->id;
            $v->view = 1;
            $v->save();
        }else{
            $month->view =  $month->view +1;
            $month->save();
        }
        $movie->view = $movie->view+1;
        $movie->save();
        $movie_lienquan = Movie::orderBy('id','DESC')->where('category_id',$movie->category_id)->whereNotIn('id',[$movie->id])->take(10)->get();
        $tap1 = Episode::with('movie')->orderBy('episode','ASC')->where('movie_id',$movie->id)->first();
        $tapmoi = Episode::with('movie')->orderBy('episode','DESC')->where('movie_id',$movie->id)->first();
        return view('page.movie',compact('genres','countries','categories','movie','movie_lienquan','tap1','tapmoi'));
    }
    public function watch($slug_movie, $tap)
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
    
        
        $tapphim = substr($tap,4,2);
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $movie = Movie::where('slug_movie',$slug_movie)->first();
        
        $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        $movie_lienquan = Movie::orderBy('id','DESC')->where('category_id',$movie->category_id)->whereNotIn('id',[$movie->id])->take(10)->get();
        return view('page.watch',compact('genres','countries',
        'categories','trailer','movie','episode','movie_lienquan','topday','topweek','topmonth'));
    }
    public function episode()
    {
        return view('page.episode');
    }
    public function year($slug)
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $movie = Movie::orderBy('id','DESC')->where('year',$slug)->paginate(20);
        $year = $slug;
        return view('page.year',compact('genres','countries','categories','movie','year','trailer','topday','topweek','topmonth'));
    }
    public function tag($tag)
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $tags = explode("-",$tag);
        $movie = Movie::where(
            function ($query) use($tags){
                for ($i = 0; $i <count($tags); $i++){
                    $query->orWhere('tags','LIKE','%'.$tags[$i].'%');
                }
            }
        )->paginate(20);
        return view('page.tag',compact('genres','countries','categories','movie','tag','trailer','topday','topweek','topmonth'));
    }
    public function search()
    {
        $topday = View::orderBy('view','DESC')
        ->where('time',Carbon::now('Asia/Ho_Chi_minh')->format('d/m/Y'))
        ->take(5)->get();
        $topweek = WeekView::orderBy('view','DESC')
        ->where('week',Carbon::now('Asia/Ho_Chi_minh')->weekOfYear)
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $topmonth = MonthView::orderBy('view','DESC')
        ->where('month',Carbon::now('Asia/Ho_Chi_minh')->format('m'))
        ->where('year',Carbon::now('Asia/Ho_Chi_minh')->format('Y'))
        ->take(5)->get();
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $tukhoa = $_GET['tukhoa'];
        $movie = Movie::where('title','LIKE', '%'.$tukhoa.'%')
        ->orWhere('description','LIKE', '%'.$tukhoa.'%')
        ->orWhere('tags','LIKE', '%'.$tukhoa.'%')
        ->paginate(20);
        return view('page.search',compact('genres','countries','categories','movie','trailer','tukhoa','topday','topweek','topmonth'));
    }

}
