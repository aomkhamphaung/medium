<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $user = User::find($id);
        $favorites = Favorite::where('user_id', $user->id)->with('user', 'post')->get();

        return view('profile', compact('user', 'favorites'))->with('posts');
    }

    public function update(Request $request, $id){
        $file_name = $request->file('profile');
        if($file_name){
            $name = time() . '_' . $file_name->getClientOriginalName();
            $file_name->storeAs('public/profile', $name);
        }else{
            $name = 'profile_default.jpg';
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->profile = $name;
        $user->save();

        // dd($user);
        
        return redirect()->back()->with('success', 'Profile Update Successfully!');
    }

    public function changePassword(Request $request, $id){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        $user = User::find($id);

        if(!Hash::check($request->old_password, $user->password)){
            return redirect()->back()->withErrors(['Old password is incorrect!']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Password updated successfully!');
    }

}
