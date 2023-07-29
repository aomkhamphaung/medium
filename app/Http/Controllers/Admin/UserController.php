<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::all();

        return redirect()->route('admin.index', compact('users'));
    }
}
