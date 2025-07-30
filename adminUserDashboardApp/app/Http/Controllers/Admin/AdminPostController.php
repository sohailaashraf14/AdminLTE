<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all(); // Needed for the author select dropdown
        return view('admin.posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully.');
    }


    public function edit(Post $post)
    {
        $users = User::all(); // for dropdown
        return view('admin.posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Post deleted successfully');
    }
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


}
