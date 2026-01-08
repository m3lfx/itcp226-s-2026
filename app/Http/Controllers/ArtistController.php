<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

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
        // dd($request);
        // dd($request->artist_name, $request->country, $request->image);
        $artist = new Artist;
        $artist->name = trim($request->artist_name);
        $artist->country = trim($request->country);
        $artist->img_path = trim($request->image);
        $artist->save();
        return redirect('/artists');
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