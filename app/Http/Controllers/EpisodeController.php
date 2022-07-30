<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EpisodeController extends Controller
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
        $movies = Movie::orderBy('id','DESC')->get();;
        $list = Episode::orderBy('id','DESC')->get();
        return view('admincp.episode.form',compact('movies','list'));
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
            'movie_id' => 'required',
            'link' => 'required',
            'episode' => 'required',
        ],[
            'movie_id.required' => 'required',
            'link.required' => 'required',
            'episode.required' => 'required',
        ]);
        $episode = new Episode();
        $episode->movie_id = $request->movie_id;
        $episode->link = $request->link;
        $episode->episode = $request->episode;
        $episode->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->route('episode.create')->with('success','Thêm thành công');
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
        $episode = Episode::find($id);
        $movies = Movie::all();
        $list = Episode::all();
        return view('admincp.episode.form',compact('movies','list','episode','list'));
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
            'movie_id' => 'required',
            'link' => 'required',
            'episode' => 'required',
        ],[
            'movie_id.required' => 'required',
            'link.required' => 'required',
            'episode.required' => 'required',
        ]);
        $episode = Episode::find($id);
        $episode->movie_id = $request->movie_id;
        $episode->link = $request->link;
        $episode->episode = $request->episode;
        
        $episode->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $episode->save();
        return redirect()->route('episode.create')->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::find($id)->delete();
        return redirect()->route('episode.create')->with('success','Xóa thành công');
    }
}
