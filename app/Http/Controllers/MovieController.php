<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_category;
use App\Models\Movie_genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $genres = Genre::all();
        $categories = Category::all();
        $countries = Country::pluck('title','id');
        $list = Movie::orderBy('id','DESC')->get();
        return view('admincp.movie.index', compact('list','genres','categories','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $categories = Category::all();
        $countries = Country::pluck('title','id');
        $list = Movie::orderBy('id','DESC')->get();
        return view('admincp.movie.form', compact('list','genres','categories','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->image);
        $data = $request->validate([
            'title'=>'required|unique:movies',
            'description'=>'required',
            'image'=>'required',
            'genre_id'=>'required',
            'category_id'=>'required',
        ],[
            'title.required'=>'Tên không được bỏ trống',
            'title.unique'=>'Phim đã tồn tại',
            'description.required'=>'Tóm tắt không được để trống',
            'image.required'=>'Ảnh không được để trống',
            'genre_id.required'=>'Thể loại không được để trống',
            'category_id.required'=>'Danh mục không được để trống',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $image =Str::slug($request->title).'_'.Str::random(2).'.'.$extension;
                while (file_exists("image/posts/". $image))
                  $image = Str::slug($request->title).'_'.Str::random(2).'.'.$extension;
                  $file->move('image/posts', $image);
                }
           }
        $movie = new Movie();
        $movie->image  =$image;
        $movie->title = $request->title;
        $movie->slug_movie = Str::slug($request->title);
        $movie->description	 = $request->description;
        $movie->tags	 = $request->tags;
        $movie->trailer	 = 'https://www.youtube.com/embed/'.$request->trailer;
        $movie->view	 = 0;
        $movie->year	 = $request->year;
        $movie->fullepi	 = $request->fullepi;
        $movie->time	 = $request->time;
        $movie->status	 = $request->status;
        $movie->hot	 = $request->hot;
        $movie->new	 = $request->new;
        $movie->resolution	 = $request->resolution;
        $movie->sub	 = $request->sub;
        $movie->country_id = $request->country_id;
        $mang1 = $request->genre_id;
        foreach($mang1 as $key => $muc){
            $movie->genre_id = $mang1[0];
         }
        $mang2 = $request->category_id;
        foreach($mang2 as $key => $muc){
            $movie->category_id = $mang2[0];
         }
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->save();
        $movie->movie_genre()->attach($data['genre_id']);
        $movie->movie_category()->attach($data['category_id']);
        return redirect()->route('movie.create')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genres = Genre::all();
        $categories = Category::all();
        $countries = Country::pluck('title','id');
        $movie = Movie::find($id);
        $list = Movie::orderBy('id','DESC')->get();
        return view('admincp.movie.form', compact('list','genres','categories','countries','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title'=>'required|unique:movies,title,'.$id,
            'description'=>'required',
            
            'genre_id'=>'required',
            'category_id'=>'required',
        ],[
            'title.required'=>'Tên không được bỏ trống',
            'title.unique'=>'Phim đã tồn tại',
            'description.required'=>'Tóm tắt không được để trống',
            
            'genre_id.required'=>'Thể loại không được để trống',
            'category_id.required'=>'Danh mục không được để trống',
        ]);
        $movie = Movie::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0
                ||strcasecmp($extension, 'jfif')=== 0) {
                  $nimage =Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
                while (file_exists("image/posts/". $nimage))
                  $nimage = Str::slug($request->title).'_'.Str::random(5).'.'.$extension;
                  $file->move('image/posts', $nimage);
                  $image_path = 'image/posts/'.$movie->image;
                    if (File::exists($image_path)) {
                    File::delete($image_path);
                    //unlink($image_path);
                }
                $movie->image  = $nimage;
           }
        
        }
        $movie->title = $request->title;
        $movie->slug_movie = Str::slug($request->title);
        $movie->description	 = $request->description;
        $movie->tags	 = $request->tags;
        $movie->trailer	 = $request->trailer;
        $movie->year	 = $request->year;
        $movie->fullepi	 = $request->fullepi;
        $movie->time	 = $request->time;
        $movie->status	 = $request->status;
        $movie->hot	 = $request->hot;
        $movie->new	 = $request->new;
        $movie->resolution	 = $request->resolution;
        $movie->sub	 = $request->sub;
        $movie->country_id = $request->country_id;
        $mang1 = $request->genre_id;
        foreach($mang1 as $key => $muc){
            $movie->genre_id = $mang1[0];
         }
        $mang2 = $request->category_id;
        foreach($mang2 as $key => $muc){
            $movie->category_id = $mang2[0];
         }
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->save();
        $movie->movie_genre()->sync($data['genre_id']);
        $movie->movie_category()->sync($data['category_id']);
        return redirect()->route('movie.create')->with('success', 'Sửa thành công');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $category = Movie_category::where('movie_id',$id)->get();
        $genre = Movie_genre::where('movie_id',$id)->get();
        $image_path = 'image/posts/'.$movie->image;
        if (File::exists($image_path)) {
        File::delete($image_path);
        //unlink($image_path);
        }
        foreach($movie->episode as $epi){
            $epi->delete();
        }
        $movie->delete();
        foreach ($category as $key => $value) {
            $value->delete();
        }
        foreach ($genre as $key => $value) {
            $value->delete();
        }

        return redirect()->route('movie.create')->with('success', 'Xóa thành công');
    }
    public function hot(Request $request){
        $data = $request->all();
       
        $movie = Movie::find($data['movie_id']);
        $movie->hot = $data['hot'];
        
        $movie->save();
    }
    public function new(Request $request){
        $data = $request->all();
       
        $movie = Movie::find($data['movie_id']);
        $movie->new = $data['new'];
        
        $movie->save();
    }
    public function year(Request $request){
        $data = $request->all();
       
        $movie = Movie::find($data['movie_id']);
        $movie->year = $data['year'];
        
        $movie->save();
    }
    public function day()
    {
        foreach(Movie::all() as $item){
            $item->top_day = 0;
            $item->save();
        }
        return back();
    }
    public function week()
    {
        foreach(Movie::all() as $item){
            $item->top_week = 0;
            $item->save();
        }
        return back();
    }
    public function month()
    {
        foreach(Movie::all() as $item){
            $item->top_month = 0;
            $item->save();
        }
        return back();
    }
}
