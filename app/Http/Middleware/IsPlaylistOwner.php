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
        
        // dd($request->playlist);

        $user = Auth::user();
        $playlistId = $request->playlist;

        $playlist = Playlist::find($playlistId);
        // dd($playlist);
        
            if($user->id == $playlist->user_id){
                return $next($request);
            } else{
            return redirect(route('playlist.index'));
            }
        
    }
}
