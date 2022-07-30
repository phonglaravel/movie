@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý phim</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                    {!! Form::open(['method' => 'POST', 'route' => 'movie.store','enctype'=> 'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['method' => 'PUT', 'route' => ['movie.update',$movie->id], 'class' => 'form-horizontal','enctype'=> 'multipart/form-data']) !!}
                    @endif
                    @csrf
                    <div class="form-group">
                    {!! Form::label('title', 'Tên phim') !!}
                    {!! Form::text('title', isset($movie)? $movie->title:'', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('trailer', 'trailer') !!}
                        {!! Form::text('trailer', isset($movie)? $movie->trailer:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('trailer') }}</small>
                        </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả') !!}
                        {!! Form::textarea('description', isset($movie)? $movie->description:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', 'Tags') !!}
                        {!! Form::textarea('tags', isset($movie)? $movie->tags:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('tags') }}</small>
                    </div>
                    <div class="form-group">
                    {!! Form::label('year', 'Year') !!}
                    {!! Form::selectYear('year', 2022, 2000, isset($movie)? $movie->year:'null', ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('year') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('fullepi', 'Số tập') !!}
                        {!! Form::text('fullepi', isset($movie)? $movie->fullepi:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('fullepi') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('time', 'Thời lượng') !!}
                        {!! Form::text('time', isset($movie)? $movie->time:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('time') }}</small>
                    </div>
                    <div class="form-group">
                    {!! Form::label('image', 'Hình ảnh') !!}
                    {!! Form::file('image', ['class' => 'form-control-file']) !!}
                    @if (isset($movie))
                        <img src="{{asset('image/posts/'.$movie->image)}}" alt="">
                    @endif
                    
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>
                    <div class="form-group">
                    {!! Form::label('status', 'Trạng thái') !!}
                    {!! Form::select('status', ['1'=>'Hiển thị','0'=>'không hiển thị'], isset($movie)? $movie->status:'null', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('hot', 'Phim hot') !!}
                        {!! Form::select('hot', ['1'=>'Hot','0'=>'không'], isset($movie)? $movie->hot:'null', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('hot') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('new', 'Phim mới') !!}
                        {!! Form::select('new', ['1'=>'New','0'=>'không'], isset($movie)? $movie->new:'null', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('new') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('resolution', 'Định dạng') !!}
                        {!! Form::select('resolution', ['0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam'], isset($movie)? $movie->resolution:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('new') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('sub', 'Phụ đề') !!}
                        {!! Form::select('sub', ['0'=>'Vietsub','1'=>'Lồng tiếng','2'=>'Engsub'], isset($movie)? $movie->sub:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('new') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('country_id', 'Nước') !!}
                        {!! Form::select('country_id', $countries, isset($movie)? $movie->country_id:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('country_id') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Danh mục') !!}
                        <br/>
                        @foreach ($categories as $item)
                        @if (isset($movie))
                        {!! Form::checkbox('category_id[]', $item->id, $movie->category_id == $item->id ? 'checked': '') !!}
                        @else
                        {!! Form::checkbox('category_id[]', $item->id) !!}
                        @endif
                            {!! Form::label('category_id', $item->title) !!}
                        @endforeach
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('genre_id', 'Thể loại') !!}
                        <br/>
                        @foreach ($genres as $item)
                            @if (isset($movie))
                            {!! Form::checkbox('genre_id[]', $item->id, $movie->genre_id == $item->id ? 'checked': '') !!}
                            @else
                            {!! Form::checkbox('genre_id[]', $item->id) !!}
                            @endif
                            {!! Form::label('genre_id', $item->title) !!}
                        @endforeach
                        <small class="text-danger">{{ $errors->first('genre_id') }}</small>
                    </div>
                    <div class="btn-group pull-right">
                    @if (!isset($movie))
                    {!! Form::submit('Thêm', ['class' => 'btn btn-success']) !!}
                    @else
                    {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                    @endif
                    
                    </div>
                    {!! Form::close() !!}
                    
                    
                </div>
            </div>
        </div><br/>
        <div>
            <button class="btn btn-primary" id="btn">Danh sách</button>
        </div>
        
        <div class="col-md-12 danhsach">
            <table class="table" id="tablemovie">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Kích hoạt</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach ($list as $key=> $item)
                    <tr>
                        <th scope="col">{{$key+1}}</th>
                        <th scope="col">{{$item->title}}</th>
                        <th scope="col">
                            @if ($item->status==1)
                            Hiển thị
                            @else
                            Không hiển thị
                            @endif</th>
                        <th scope="col">{{$item->country->title}}</th>
                        <th scope="col">@foreach ($item->movie_category as $it)
                            <p>{{$it->title}}</p>
                        @endforeach</th>
                        <th scope="col">@foreach ($item->movie_genre as $it)
                            <p>{{$it->title}}</p>
                        @endforeach</th>
                        
                        <th scope="col"><a class="btn btn-primary" href="{{route('movie.edit',$item->id)}}" role="button">Sửa</a></th>
                        <th scope="col">{!! Form::open(['method' => 'delete', 'route' => ['movie.destroy',$item->id], 'onsubmit' => 'return confirm("Xóa hay không")']) !!}
                            @csrf
                            
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}</th>
                    </tr>
                    @endforeach
                    
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
