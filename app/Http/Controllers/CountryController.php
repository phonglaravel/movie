<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
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
        $list = Country::orderBy('id','DESC')->get();
        return view('admincp.country.form', compact('list'));
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
            'title'=>'required|unique:categories'
            
        ],[
            'title.required'=>'Tên quốc gia không được để trống',
            'title.unique'=>'Tên quốc gia đã tồn tại'
        ]);
        $country = new Country();
        $country->title = $request->title;
        $country->slug_country = Str::slug($request->title);
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
        return redirect()->route('country.create')->with('success','Thêm quốc gia thành công');
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
        $country = Country::find($id);
        $list = Country::orderBy('id','DESC')->get();
        return view('admincp.country.form', compact('list','country'));
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
            'title'=>'required|unique:categories,title,'.$id
        ],[
            'title.required'=>'Tên danh mục không được để trống',
            'title.unique'=>'Tên danh mục đã tồn tại'
        ]);
        $country = Country::find($id);
        $country->title = $request->title;
        $country->slug_country = Str::slug($request->title);
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
        return redirect()->route('country.create')->with('success','Sửa quốc gia thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id)->delete();
        return redirect()->route('country.create')->with('success','Xóa quốc gia thành công');
    }
}