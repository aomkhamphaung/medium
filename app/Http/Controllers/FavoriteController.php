<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function addToFavorite(Request $request){
        // dd($request->all());
        $favorites = new Favorite();
        $favorites->post_id = $request->post_id;
        $favorites->user_id = Auth::user()->id;
        $favorites->save();

        return redirect()->back()->with('success', 'Added to favorite!');        
    }

    public function removeFromFavorite(Request $request){
        $post_id = $request->post_id;
        $user_id = Auth::user()->id;
        Favorite::where('user_id', $user_id)->where('post_id', $post_id)->delete();

        return redirect()->back()->with('success', 'Removed from favorite!');
    }
}
