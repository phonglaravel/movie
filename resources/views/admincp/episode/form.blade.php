@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý tập phim</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (!isset($episode))
                    {!! Form::open(['method' => 'POST', 'route' => 'episode.store', 'class' => 'form-horizontal']) !!}
                    @else
                    {!! Form::open(['method' => 'PUT', 'route' => ['episode.update',$episode->id], 'class' => 'form-horizontal']) !!}
                    @endif
                    @csrf
                    <div class="form-group">
                        <select id="select_movie" name="movie_id" class="selectpicker w-100 border rounded" data-show-subtext="true" data-live-search="true">
                            @if(isset($episode))
                            <option value="">Chọn phim</option>
                            @foreach($movies as $item)
                        <option value="{{$item->id}}" @if ($episode->movie_id == $item->id)
                            selected
                        @endif>{{$item->title}} </option>
                            @endforeach
                            @else
                            <option value="">Chọn phim</option>
                            @foreach($movies as $item)
                        <option value="{{$item->id}}" >{{$item->title}} </option>
                            @endforeach
                            @endif
                        </select>
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                    <div class="form-group">
                    {!! Form::label('link', 'Link') !!}
                    {!! Form::textarea('link', isset($episode)? $episode->link:'<p><iframe allowfullscreen frameborder="0" width="100%" height="450" src="https://short.ink/azNkZcAiq"></iframe></p>', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('link') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('episode', 'Tập') !!}
                        {!! Form::text('episode', isset($episode)? $episode->episode:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('episode') }}</small>
                        </div>
                    <div class="btn-group pull-right">
                    @if (!isset($episode))
                    {!! Form::submit('Thêm', ['class' => 'btn btn-success']) !!}
                    @else
                    {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                    @endif
                    
                    </div>
                    {!! Form::close() !!}
                    
                    
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary" id="btn">Danh sách</button>
        </div>
        
        <div class="col-md-11 danhsach">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Phim</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tập</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($list as $key=> $item)
                    <tr>
                        <th scope="col">{{$key+1}}</th>
                        <th scope="col">{{$item->movie->title}}</th>
                        <th scope="col">{{$item->link}}</th>
                        <th scope="col">{{$item->episode}}</th>
                        <th scope="col"><a class="btn btn-primary" href="{{route('episode.edit',$item->id)}}" role="button">Sửa</a></th>
                        <th scope="col">{!! Form::open(['method' => 'delete', 'route' => ['episode.destroy',$item->id], 'onsubmit' => 'return confirm("Xóa hay không")']) !!}
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
