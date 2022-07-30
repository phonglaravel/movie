@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-12 danhsach">
            <a class="btn btn-primary" href="{{route('movie.create')}}" role="button">Thêm phim</a>
            <table class="table" id="tablemovie">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Năm</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col">Kích hoạt</th>
                    <th scope="col">Hot</th>
                    <th scope="col">New</th>
                    <th scope="col">Định dạng</th>
                    <th scope="col">Phụ đề</th>
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
                            {!! Form::selectYear('year', 2022, 2000,  $item->year,['class'=>'yearmovie','id'=>$item->id]) !!}
                        </th>
                        <th scope="col">{{$item->time}}</th>
                        <th scope="col">
                            @if ($item->status==1)
                            Hiển thị
                            @else
                            Không hiển thị
                            @endif
                        </th>
                        <th scope="col">
                            @if ($item->hot==1)
                            <form>
                                @csrf
                              <select data-movie_id="{{$item->id}}" style="width :90%" name="hot" class="hotmovie form-select" aria-label="Default select example">Hot
                                <option value="1"  selected >Hot</option>
                                <option value="0">không</option> 
                               </select>
                            </form>
                            @else
                            <form>
                                @csrf
                              <select data-movie_id="{{$item->id}}" style="width :90%" name="hot" class="hotmovie form-select" aria-label="Default select example">Hot
                                <option value="1"   >Hot</option>
                                <option value="0" selected>không</option> 
                               </select>
                            </form>
                            @endif
                        </th>
                        <th scope="col">
                            @if ($item->new==1)
                            <form>
                                @csrf
                              <select data-movie_id="{{$item->id}}" style="width :90%" name="new" class="neww form-select" aria-label="Default select example">Hot
                                <option value="1"  selected >New</option>
                                <option value="0">không</option> 
                               </select>
                            </form>
                            @else
                            <form>
                                @csrf
                              <select data-movie_id="{{$item->id}}" style="width :90%" name="new" class="neww form-select" aria-label="Default select example">Hot
                                <option value="1"   >New</option>
                                <option value="0" selected>không</option> 
                               </select>
                            </form>
                            @endif
                        </th>
                        <th scope="col">
                            @if ($item->resolution==0)
                            HD
                            @elseif($item->resolution==1)
                            SD
                            @elseif($item->resolution==2)
                            HDCam
                            @else
                            Cam
                            @endif
                        </th>
                        <th scope="col">
                            @if ($item->sub==0)
                            Vietsub
                            @elseif($item->sub==1)
                            Lồng tiếng
                            @else
                            Engsub
                            @endif
                        </th>
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
