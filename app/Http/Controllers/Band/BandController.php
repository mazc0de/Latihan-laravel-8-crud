<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{

    public function table(){
        $bands = Band::latest()->paginate(16);
        $title = 'Band List';
        return view('bands.table', compact('bands','title'));
    }

    public function create(){

        return view('bands.create', [
            'genres' => Genre::get(),
            'band' => new Band,
            'submit' => 'Submit',
            'title' => 'Add Band'
        ]);
    }

    public function store(){
        request()->validate([
            'name' => 'required|unique:bands,name',
            'genres' => 'required|array',
            'thumbnail' => request('thumbnail') ? 'image|mimes:png,jpg,jpeg' : '',
        ]);

        $band = Band::create([
            'name' => request('name'),
            'thumbnail' => request('thumbnail') ? request()->file('thumbnail')->store('images/band') : null,
            'slug' => Str::slug(request('name'))
        ]);

        $band->genres()->sync(request('genres'));

        return back()->with('success', 'Band berhasil dibuat');
    }

    public function edit(Band $band){
        return view('bands.edit',[
            'band' => $band,
            'genres' => Genre::get(),
            'submit' => 'Update',
            'title' => 'Edit Band'
        ]);
    }

    public function update(Band $band){
        request()->validate([
            'name' => 'required|unique:bands,name,' . $band->id,
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'genres' => 'required|array'
        ]);

        if (request('thumbnail')){
            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/band");
        } elseif($band->thumbnail){
            $thumbnail = $band->thumbnail;
        } else{
            $thumbnail = null;
        }

        $band->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $thumbnail,
        ]);

        $band->genres()->sync(request('genres'));

        return redirect()->route('bands.table')->with('success', 'Album was edited');
    }

    public function destroy(Band $band){
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->albums()->delete();
        $band->delete();

        // return back()->with('success', 'Band berhasil dihapus');

    }
}
