<?php
namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard',[
            'users' => User::latest()->get(),
            'posts'=>Post::with('user')->latest()->get(),
        ]);
    }
}
