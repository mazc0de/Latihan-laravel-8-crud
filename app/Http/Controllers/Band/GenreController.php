<?php

namespace App\Http\Controllers\Band;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function create(){
        $title = "Add genres";
        $submitBtn = "Update";
        return view('genres.create', compact('title','submitBtn'));
    }

    public function store(){
        request()->validate([
            'name' => 'required|unique:genres,name',
        ]);

        Genre::create([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return back()->with('success', 'Genre was added');
    }

    public function table(){
        $title = "List genres";
        $genres = Genre::latest()->paginate(16);
        return view('genres.table', compact('title','genres'));
    }

    public function edit(Genre $genre){
        $title = "Edit genres";
        $genre = $genre;
        $submitBtn = "Update";
        return view('genres.edit', compact('title', 'genre','submitBtn'));
    }

    public function update(Genre $genre){
        request()->validate([
            'name' => 'required|unique:genres,name',
        ]);

        $genre->update([
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        return redirect()->route('genres.table')->with('success','Genres was edited');
    }

    public function destroy(Genre $genre){
        $genre->delete();
    }
}
