<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Playlist;

class IsPlaylistOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // $playlist = PlayList::find($request->playlist_id);
        $playlistId = $request->input('playlist_id');
        $playlist = Playlist::find($playlistId);
        
        if($user->id == $playlist->user_id){
            return $next($request);
        } else{
        return redirect(route('playlist.addsong'));
        }
        
    }
}
