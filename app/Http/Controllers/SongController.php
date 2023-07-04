<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $query = Song::with('genre');
        $genres = Genre::all();
        $songs = Song::all();
        
        if ($request->has('genre') && $request->genre != '') {

            $genreId = $request->genre;

            $query->where('genre_id', $genreId);

        }

        $songs = $query->get();

        return view('song.index', ['songs'=>$songs, 'genres'=>$genres]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('song.create', ['genres'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'releasedate'=>['date','required'],
            'duration' => ['integer', 'required','gt:3'],
            'genre_id' => 'required'

        ]);
        Song::create([
            
            "name" => $request["name"],
            "author" => $request['author'],
            "releasedate" => $request['releasedate'],
            "duration" => $request['duration'],
            'genre_id' => $request['genre_id']
        ]);
        return redirect('song/all');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('song.show', ['song'=>$song]);
        // $songs = Song::where('genre_id', 'selectedGenre');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
