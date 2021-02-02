<?php

namespace App\Http\Controllers\Band;

use Illuminate\Support\Str;
use App\Models\{Band,Album};
use App\Http\Controllers\Controller;
use App\Http\Requests\Band\AlbumRequest;

class AlbumController extends Controller
{
    public function table(){
        $title = 'List Albums';
        $albums = Album::paginate(16);
        return view('albums.table', compact('albums', 'title'));
    }

    public function create(){
        $title = 'Add Album';
        $bands = Band::get();
        $submitBtn = 'Create';
        $album = new Album;
        return view('albums.create', compact('title','bands','submitBtn','album'));
    }

    public function store(AlbumRequest $request){
        // validation dilakukan pada AlbumRequest
        
        Album::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);

        $band = Band::find(request('band'));

        return back()->with('success', 'Album was created into '. $band->name);
    }

    public function edit(Album $album){
        $title = "Edit Album : {$album->name}";
        $album = $album;
        $bands = Band::get();
        $submitBtn = 'Update';

        return view('albums.edit', compact('title','album','submitBtn','bands'));
    }

    public function update(Album $album, AlbumRequest $request){
        // validation dilakukan pada AlbumRequest
        $album->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'band_id' => request('band'),
            'year' => request('year'),
        ]);

        $band = Band::find(request('band'));

        return redirect()->route('albums.table')->with('success', 'Album was edited');
    }

    public function destroy(Album $album){
        $album->delete();
    }
}
