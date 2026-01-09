<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        // dd($artists);
        return view('artist.index', compact('artists'));
    }
    // Route::get('/artists/create', [ArtistController::class, 'create']);
    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));
        $name = $request->file('image')->getClientOriginalName();
        $extension = $request->file('image')->getClientOriginalExtension();
        // dd($extension);
        $path = Storage::putFileAs(
            'public/images',
            $request->file('image'),
            $name
        );
        // dd($request->artist_name, $request->country, $request->image);
        $artist = new Artist;
        $artist->name = trim($request->artist_name);
        $artist->country = trim($request->country);
        $artist->img_path = 'storage/images/' . $name;
        $artist->save();
        // return redirect('/artists');
        return redirect()->route('artists.index');
    }

    public function edit($id)
    {

        // dd($id);
        $artist = Artist::find($id);
        // dd($artist);
        return view('artist.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        // dd($request, $id);
        $artist = Artist::find($id);
        $artist->name = $request->name;
        $artist->country = $request->country;
        $artist->img_path = $request->image;
        $artist->save();
        return redirect('/artists');
    }

    public function delete($id)
    {
        Artist::destroy($id);
        return redirect('/artists');
    }
}