@extends('layouts.app')

@section('content')

    <h1>{{$album->name}}</h1>
    <a href='/' class="btn btn-outline-warning">Go Back</a>
    <a href='/photos/create/{{$album->id}}' class="btn btn-outline-secondary">Upload A Photo To This Album</a>
    <hr>
@endsection