<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registered(RegisterRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->bio = $request->bio;
        $user->gender = $request->gender;
        $user->profile = 'user_default.jpg';
        $user->save();

        Auth::login($user);

        return redirect()->route('posts.index')->with('success', 'Registered successfully!');
        //return redirect()->route('login-form');
    }   

    public function loginForm(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->role === 'admin'){
                return redirect()->route('admin.index')->with('success', 'Login success!');
            }
            
            return redirect()->route('posts.index')->with('success', 'Login success!');
        }
    
        return back()->with('error', 'The credentials do not match our records!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
