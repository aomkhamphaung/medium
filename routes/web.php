<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Models\Favorite;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    // dd(Session::get('locale'));
    return redirect()->back();
});

Route::get('/', function () {
    $posts = Post::all();
    return view('welcome', compact('posts'))->with('user');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

//Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registered', [AuthController::class, 'registered'])->name('registered');

//Login
Route::get('login-form', [AuthController::class, 'loginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//Logout
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    //Post
    Route::resource('posts', PostController::class);

    //Profile
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update-profile/{id}', [ProfileController::class, 'update'])->name('update-profile');
    Route::post('/change-password/{id}', [ProfileController::class, 'changePassword'])->name('change-password');

    //Comment
    Route::resource('comments', CommentController::class);

    //Reply
    Route::post('/store-reply', [ReplyController::class, 'store'])->name('reply.store');
    Route::delete('/delete-reply/{id}', [ReplyController::class, 'destroy'])->name('reply.delete');

    //Favorite
    Route::post('/favorites/add', [FavoriteController::class, 'addToFavorite'])->name('favorites.add');
    Route::post('/favorites/remove', [FavoriteController::class, 'removeFromFavorite'])->name('favorites.remove');
});

Route::prefix('/admin')->middleware('auth','admin')->group(function(){
    Route::get('/dashboard', function () {
        $users = User::whereNotIn('id', [1])->get();
        return view('admin.index', compact('users'));
    })->name('admin.index');

    //category
    Route::resource('/categories', CategoryController::class);
});
