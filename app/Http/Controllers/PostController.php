<?php

namespace App\Http\Controllers; 

use App\Models\Tag; 
use App\Models\Post; 
use App\Models\Comment; 
use App\Models\Category;
use App\Models\PostPoint;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        $points = array();
        foreach ($posts as $post) {
            $points[$post->id] = round(PostPoint::where('post_id', $post->id)
                                                ->avg('score'));  
        }

        return view('posts.index', compact('posts', 'points'));
    }

    public function show(Post $post){ 

        $this->authorize('published', $post);
        
        // dd($post->comments);
        // $comments = Comment::find('post_id', $post->id)  
        //                     ->get();
        // $this->authorize('commentPublished', $comments);  
        // $users = User::where('id', $comments->id)  
         $post->count += 1;                 //->; 
         $post->save(); //mediante estas dos líneas de código se suma una visita. 

        $similars = Post::where('category_id', $post->category_id)
                       ->where('status', 2) 
                       ->where('id', '!=', $post->id)
                       ->latest('id') 
                       ->take(5) 
                       ->get();
 
        $maxviews = Post::orderBy('count','DESC')->where('category_id', $post->category_id)->take(5)->get(); 
 

        return view('posts.show', compact('post', 'similars','maxviews')); 
    } 
  
 
    public function category(Category $category){
        $categories = Category::all();

        $posts = Post::where('category_id', $category->id)
                     ->where('status', 2)
                     ->latest('id')
                     ->paginate(6);
        
        $points = array();
        foreach ($posts as $post) {
            $points[$post->id] = round(PostPoint::where('post_id', $post->id)
                                                ->avg('score'));  
        }

        return view('posts.category', compact('category', 'categories', 'posts', 'points'));
    }

    public function tag(Tag $tag){
        $tags = Tag::all();
        
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(6);
        
        //$myPosts = Post::all();
        
       // foreach ($myPosts->tags as $tag) {
    
       //}

        //$maxviews = Post::orderBy('count','DESC')->where($post->id, $post->id)->take(5)->get(); 

        $points = array();
        foreach ($posts as $post) {
            $points[$post->id] = round(PostPoint::where('post_id', $post->id)
                                                ->avg('score'));  
        }

        return view('posts.tag', compact('tag', 'tags', 'posts', 'points'));
    }

    public function maxViews(Post $post){

        $posts = Post::orderBy('count','DESC')
                    ->paginate(6);
 

        return view ('posts.maxviews', compact('post', 'posts')); 
    }
 
     public function maxComments(Post $post){

     $posts = $post->comments()->orderBy(('post'), 'DESC')
                     ->paginate(6);
 
         return view('posts.maxcomments', compact('post', 'posts'));
     }
}   


