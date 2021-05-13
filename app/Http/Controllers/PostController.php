<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        $this->authorize('published', $post);

        // $comments = Comment::find('post_id', $post->id)  
        //                     ->get();

        // $users = User::where('id', $comments->id)
                    // ->;

        $similars = Post::where('category_id', $post->category_id)
                       ->where('status', 2)
                       ->where('id', '!=', $post->id)
                       ->latest('id')
                       ->take(5)
                       ->get();

        return view('posts.show', compact('post', 'similars'));
    }

    public function category(Category $category){
        $categories = Category::all();

        $posts = Post::where('category_id', $category->id)
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(6);

        return view('posts.category', compact('posts', 'category', 'categories'));
    }

    public function tag(Tag $tag){
        $tags = Tag::all();
        
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(6);

        return view('posts.tag', compact('tag', 'tags', 'posts'));
    }
}
