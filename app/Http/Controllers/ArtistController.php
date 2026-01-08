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
        return "artist saved";
    }

    public function edit($id)
    {
        dd($id);
        // $artist = Artist::find($id);
        // return view('artist.edit', compact('artist'));
    }
}