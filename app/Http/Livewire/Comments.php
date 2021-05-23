<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $post;
    public $comment;

    public $message, $post_id ,$user_id;

    protected $listeners = ['render' => 'render'];

    public function mount(Post $post){
        $this->post = $post;
        $this->post_id = $post->id;
        $this->user_id = Auth::user()->id;
    }

    public function mountComment (Comment $comment){
        $this->comment = $comment;
    }

    public function save(){
        Comment::create([
            'message' => $this->message,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id
        ]);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
