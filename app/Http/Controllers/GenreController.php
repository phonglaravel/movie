<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Genre::orderBy('id','DESC')->get();
        return view('admincp.genre.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|unique:genres'
            
        ],[
            'title.required'=>'Tên thể loại không được để trống',
            'title.unique'=>'Tên thể loại đã tồn tại'
        ]);
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->slug_genre = Str::slug($request->title);
        $genre->description = $request->description;
        $genre->status = $request->status;
        $genre->save();
        return redirect()->route('genre.create')->with('success','Thêm thể loại thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        $list = Genre::orderBy('id','DESC')->get();
        return view('admincp.genre.form', compact('list','genre'));
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
            'title'=>'required|unique:genres,title,'.$id
        ],[
            'title.required'=>'Tên thể loại không được để trống',
            'title.unique'=>'Tên thể loại đã tồn tại'
        ]);
        $genre = Genre::find($id);
        $genre->title = $request->title;
        $genre->slug_genre = Str::slug($request->title);
        $genre->description = $request->description;
        $genre->status = $request->status;
        $genre->save();
        return redirect()->route('genre.create')->with('success','Sửa thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id)->delete();
        return redirect()->route('genre.create')->with('success','Xóa thể loại thành công');
    }
}
