@extends('layouts.app')

@section('content')



            <h3>Create Albums</h3>

            {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

            {!! Form::label('name', 'Name', ['class' => 'awesome']); !!}
            {!! Form::text('name','',['class' => 'form-control']); !!}

            {!! Form::label('description', 'Description', ['class' => 'awesome']); !!}
            {!! Form::textarea('description','',['class' => 'form-control']); !!}

            <hr>


            {!! Form::file('cover_image'); !!}

            <br><br>

            {!! Form::submit('Submit', ['class' => 'btn btn-secondary btn-lg']) !!}

            {!! Form::close() !!}



@endsection