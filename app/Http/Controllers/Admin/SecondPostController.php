<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecondPostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->paginate();

        return view('admin.posts.indextwo', compact('posts'));
    }
}
