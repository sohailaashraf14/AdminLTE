<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts=Post::with('user')->latest()->get();
        return view('user.home',compact('posts'));
    }
}
