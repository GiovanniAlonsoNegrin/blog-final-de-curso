<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.allposts');
    }

    public function index()
    {
        return view('admin.post.index');
    }
}
