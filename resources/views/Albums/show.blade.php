@extends('layouts.app')

@section('content')

    <h1>{{$album->name}}</h1>
    <a href='/' class="btn btn-outline-warning">Go Back</a>
    <a href='/photos/create/{{$album->id}}' class="btn btn-outline-secondary">Upload A Photo To This Album</a>
    <hr>

    @if(count($album->photos )>0)

        <?php
        $colcount = count($album->photos );
        $i = 1;
        ?>

        @foreach($album->photos as $photo)
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="/photos/{{$photo->id}}">
                        <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->name}}"
                             class="img-thumbnail">
                    </a>
                    <br>
                    <h4>{{$photo->title}}</h4>
                </div>
            </div>





        @endforeach

    @else
        <h2>No Item</h2>
    @endif
@endsection