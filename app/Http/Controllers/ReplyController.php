<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function store(Request $request){
        // dd($request->all());

        $reply = new Reply();
        if($request->parent_reply_id){
            $reply->parent_reply_id = $request->parent_reply_id;
        }
        $reply->comment_id = $request->comment_id;
        $reply->user_id = Auth::user()->id;
        $reply->reply = $request->reply;
        // dd($reply);

        $reply->save();

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }

    public function destroy($id){
        $reply = Reply::find($id);

        if (Auth::user()->id !== $reply->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized to delete the post');
        }
        $reply->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
