<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function create($album_id)
    {
        $info = Album::find($album_id);
        $album_name = $info->name;

        return view('Photos.create')->with('album_id', $album_id)->with('album_name', $album_name);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);

        //get the original file name with extension

        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        //get only file name

        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get only extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        //create new filename

        $filenameToStore = $filename . '_' . time() . '.' . $extension;  /*To make a uniqe file name*/

        //upload image
        $path = $request->file('photo')->storeAs('public/photos/' . $request->album_id, $filenameToStore);

        //create album
        $photo = new Photo;
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->album_id = $request->album_id;

        $photo->save();

        return redirect('/albums/' . $request->album_id)->with('success', 'Photo Uploaded');
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return view('Photos.show')->with('photo', $photo);
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        if (Storage::delete('public/photos/' . $photo->album_id . '/' . $photo->photo)) {
            $photo->delete();

            return redirect('/')->with('success', 'Photo Deleted');
        }
    }
}
