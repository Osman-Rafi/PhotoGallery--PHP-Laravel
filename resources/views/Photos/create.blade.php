@extends('layouts.app')

@section('content')



    <h3>Uplad Photo To Album "{{$album_name}}" </h3>

    {!! Form::open(['action' => 'PhotoController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

    {!! Form::label('title', 'Title', ['class' => 'awesome']); !!}
    {!! Form::text('title','',['class' => 'form-control']); !!}

    {!! Form::label('description', 'Description', ['class' => 'awesome']); !!}
    {!! Form::textarea('description','',['class' => 'form-control']); !!}

    {!! Form::hidden('album_id', $album_id) !!}

    <hr>


    {!! Form::file('photo'); !!}

    <br><br>

    {!! Form::submit('Submit', ['class' => 'btn btn-secondary btn-lg']) !!}

    {!! Form::close() !!}



@endsection