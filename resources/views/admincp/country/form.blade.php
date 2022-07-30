@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý quốc gia</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (!isset($country))
                    {!! Form::open(['method' => 'POST', 'route' => 'country.store', 'class' => 'form-horizontal']) !!}
                    @else
                    {!! Form::open(['method' => 'PUT', 'route' => ['country.update',$country->id], 'class' => 'form-horizontal']) !!}
                    @endif
                    @csrf
                    <div class="form-group">
                    {!! Form::label('title', 'Tên quốc gia') !!}
                    {!! Form::text('title', isset($country)? $country->title:'', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả') !!}
                        {!! Form::textarea('description', isset($country)? $country->description:'', ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </div>
                    <div class="form-group">
                    {!! Form::label('status', 'Trạng thái') !!}
                    {!! Form::select('status', ['1'=>'Hiển thị','0'=>'không hiển thị'], isset($country)? $country->status:'null', ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>
                    <div class="btn-group pull-right">
                    @if (!isset($country))
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
                    <th scope="col">Tên quốc gia</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Kích hoạt</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($list as $key=> $item)
                    <tr>
                        <th scope="col">{{$key+1}}</th>
                        <th scope="col">{{$item->title}}</th>
                        <th scope="col">{{$item->description}}</th>
                        <th scope="col">
                            @if ($item->status==1)
                            Hiển thị
                            @else
                            Không hiển thị
                            @endif</th>
                        <th scope="col"><a class="btn btn-primary" href="{{route('country.edit',$item->id)}}" role="button">Sửa</a></th>
                        <th scope="col">{!! Form::open(['method' => 'delete', 'route' => ['country.destroy',$item->id], 'onsubmit' => 'return confirm("Xóa hay không")']) !!}
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
