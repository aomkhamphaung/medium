<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->get();
        $latests = Post::latest()->take(3)->get();

        return view('Posts.index', compact('posts', 'latests'))->with('user');               
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $category_names = $categories->pluck('name');

        return view('Posts.create', compact('category_names'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // dd($request);
        $file_name = $request->file('image');
        if($file_name){
            $name = time() . '_' . $file_name->getClientOriginalName();
            $file_name->storeAs('public/images', $name);
        }else{
            $name = 'default_image.png';
        }
        $post = new Post();
        $post->title = $request->title;
        $post->user_id = Auth::check() ? Auth::id() : null;
        $post->category = $request->category;
        $post->image = $name;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        $latest_posts = Post::where('user_id', $post->user_id)
                            ->where('id', '!=', $post->id)
                            ->latest()
                            ->limit(3)
                            ->get();

        return view('Posts.show', compact('post', 'latest_posts'))->with('user', 'comments', 'replies');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if (Auth::user()->id !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized to edit this post');
        }

        return view('Posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add any image validation rules if needed
        ]);

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        // Update the post data
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file_name = $request->file('image');
            $name = time() . '_' . $file_name->getClientOriginalName();
            $file_name->storeAs('public/images', $name);
            $post->image = $name;
        }
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        if (Auth::user()->id !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized to delete the post');
        }
        $imagePath = public_path('storage/images/' . $post->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
