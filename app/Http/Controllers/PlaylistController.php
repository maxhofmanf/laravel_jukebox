<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Playlist;
use Illuminate\Http\Request;

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
    $playlist = Playlist::findOrFail($id);
    return view('playlist.show', ['playlist'=>$playlist]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        
    
        Playlist::destroy($playlist->id);
        return redirect(route('playlist.index'));
    
    }
}
