<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);

        //get the original file name with extension

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //get only file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get only extension
        $extension= $request->file('cover_image')->getClientOriginalExtension();

        //create new filename

        $filenameToStore= $filename.'_'.time().'.'.$extension;  /*To make a uniqe file name*/

        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_cover',$filenameToStore);

       //create album
        $album =new Album;
        $album->name= $request->name;
        $album->description= $request->description;
        $album->cover_image= $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success','Album Created');

    }

    public function show ($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('Albums.show')->with('album',$album);
    }
}
