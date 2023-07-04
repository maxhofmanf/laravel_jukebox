<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Models\Song;
class PlaylistController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $playlists = Playlist::all();
        return view('playlist.index', ['playlists'=>$playlists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playlists = Playlist::all();
        
        return view('playlist.create', ['playlists'=>$playlists]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Playlist::create([
            
        //     "name" => $request["name"],
        // ]);
        $user = Auth::user();
        $validatedData = $request -> validate([
            'name'=> 'required',
        ]);
        $playlists = new Playlist($validatedData);

        $playlists->user_id = $user->id;
        $playlists->save();
        $request->validate([
            'name' => 'required',
        ]);
        return redirect('playlist/all');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $songs = Song::all();
    $playlists = Playlist::all();
    $playlist = Playlist::findOrFail($id);
    return view('playlist.show', ['playlist'=>$playlist, 'songs'=>$songs,'playlists'=>$playlists,'playlistId' => $id,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($playlistId)
    {
        $songs= Song::all();
        $playlist = Playlist::findOrFail($playlistId);

        Playlist::findOrFail($playlistId);
        return view('playlist.edit', ['playlist'=>$playlist,'playlistId' => $playlistId, 'songs' => $songs]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId); // Retrieve the playlist by ID
        $playlist->name = $request->input('name');
        $playlist->save();
        return redirect()->route('playlist.edit', $playlist->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId);
        $playlist->songs()->detach();
        $playlist->delete();
        return redirect(route('playlist.index'));
    
    }
    // adds the specified Song from the relationship with the playlist
    public function add_song(Request $request, $playlistId)
    {
        $playlistId = $request->input('playlist_id');
        
        $playlist = Playlist::findOrFail($request->input('playlist_id'));
        $song = Song::findOrFail($request->input('song_id'));

        $playlist->songs()->attach($song);

        return redirect('playlist/all');
    }
    // removes the specified Song from the relationship with the playlist
    public function song_destroy(request $request,$playlistId,$songId ){
        $playlist_song = Playlist::findOrFail($playlistId);
    
        $playlist_song->songs()->detach($songId);
        
        return redirect(route('playlist.show',$playlistId));

    }
    }

