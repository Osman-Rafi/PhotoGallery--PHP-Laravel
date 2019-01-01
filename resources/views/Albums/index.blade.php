@extends('layouts.app')

@section('content')

    @if(count($albums)>0)

        <?php
        $colcount = count($albums);
        $i = 1;
        ?>

        @foreach($albums as $album)
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="/albums/{{$album->id}}">
                        <img src="storage/album_cover/{{$album->cover_image}}" alt="{{$album->name}}"
                             class="img-thumbnail">
                    </a>
                    <br>
                    <h4>{{$album->name}}</h4>
                </div>
            </div>





        @endforeach

    @else
        <h2>No Item</h2>
    @endif

@endsection