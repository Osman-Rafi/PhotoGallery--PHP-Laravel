@extends('layouts.app')

@section('content')

    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a href="/albums/{{$photo->album_id}}" class="btn btn-outline-info">Go to Album</a>
    <hr>
    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="">

    <br><br>
    <hr>
 {{--   <a href="/albums/{{$photo->album_id}}" class="btn btn-outline-danger">Delete This Photo</a>--}}
    <br><br><br>

    {!! Form::open(['action' => ['PhotoController@destroy',$photo->id],'method' => 'DELETE']) !!}
  {{--      {{Form::hidden('_method','DELETE')}}--}}
        {!! Form::submit('Delete This Photo',['class'=>'btn btn-outline-danger']) !!}
    {!! Form::close() !!}

    <hr>
    <small>Size: {{$photo->size}}</small>
@endsection