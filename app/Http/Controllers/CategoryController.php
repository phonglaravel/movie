<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule as ValidationRule;
class CategoryController extends Controller
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
        $list = Category::orderBy('id','DESC')->get();
        return view('admincp.category.form', compact('list'));
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
            'title.required'=>'Tên danh mục không được để trống',
            'title.unique'=>'Tên danh mục đã tồn tại'
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->slug_category = Str::slug($request->title);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.create')->with('success','Thêm danh mục thành công');
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
        $category = Category::find($id);
        $list = Category::orderBy('id','DESC')->get();
        return view('admincp.category.form', compact('list','category'));
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
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug_category = Str::slug($request->title);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.create')->with('success','Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        return redirect()->route('category.create')->with('success','Xóa danh mục thành công');
    }
}
