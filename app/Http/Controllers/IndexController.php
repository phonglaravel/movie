<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_category;
use App\Models\Movie_genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        
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
        'hot_movie','new_movie','trailer','movie_le','movie_bo','movie_rap'));
    }
    public function category($slug)
    {
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
        return view('page.category',compact('genres','countries','categories','category','movie','trailer'));
    }
    public function genre($slug)
    {
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
        return view('page.genre',compact('genres','countries','categories','genre','movie','trailer'));
    }
    public function country($slug)
    {
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $country = Country::where('slug_country',$slug)->first();
        $movie = Movie::orderBy('id', 'DESC')->where('country_id',$country->id)->paginate(20);
        return view('page.country',compact('genres','countries','categories','country','movie','trailer'));
    }
    public function movie($slug)
    {
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $movie = Movie::with('movie_genre')->where('slug_movie',$slug)->first();
        $movie->view = $movie->view+1;
        $movie->save();
        $movie_lienquan = Movie::orderBy('id','DESC')->where('category_id',$movie->category_id)->whereNotIn('id',[$movie->id])->take(10)->get();
        $tap1 = Episode::with('movie')->orderBy('episode','ASC')->where('movie_id',$movie->id)->first();
        $tapmoi = Episode::with('movie')->orderBy('episode','DESC')->where('movie_id',$movie->id)->first();
        return view('page.movie',compact('genres','countries','categories','movie','movie_lienquan','tap1','tapmoi'));
    }
    public function watch($slug_movie, $tap)
    {
        if(isset($episode)){
            $tapphim = $tap;
        }
        else{
            $tapphim = 1;
        }
        $tapphim = substr($tap,4,1);
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $movie = Movie::where('slug_movie',$slug_movie)->first();
        $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        $movie_lienquan = Movie::orderBy('id','DESC')->where('category_id',$movie->category_id)->whereNotIn('id',[$movie->id])->take(10)->get();
        return view('page.watch',compact('genres','countries',
        'categories','trailer','movie','episode','movie_lienquan'));
    }
    public function episode()
    {
        return view('page.episode');
    }
    public function year($slug)
    {
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $movie = Movie::orderBy('id','DESC')->where('year',$slug)->paginate(20);
        $year = $slug;
        return view('page.year',compact('genres','countries','categories','movie','year','trailer'));
    }
    public function tag($tag)
    {
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
        return view('page.tag',compact('genres','countries','categories','movie','tag','trailer'));
    }
    public function search()
    {
        $genres = Genre::where('status',1)->get();
        $categories = Category::where('status',1)->whereNotIn('id',[17])->get();
        $countries = Country::orderBy('id', 'ASC')->where('status',1)->get();
        $trailer = Movie::orderBy('ngaycapnhat','DESC')->where('category_id',17)->take(7)->get();
        $tukhoa = $_GET['tukhoa'];
        $movie = Movie::where('title','LIKE', '%'.$tukhoa.'%')
        ->orWhere('description','LIKE', '%'.$tukhoa.'%')
        ->orWhere('tags','LIKE', '%'.$tukhoa.'%')
        ->paginate(20);
        return view('page.search',compact('genres','countries','categories','movie','trailer','tukhoa'));
    }

}