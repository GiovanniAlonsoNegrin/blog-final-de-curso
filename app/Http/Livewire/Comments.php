<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Comments extends Component
{
    public $post;
    public $comment;

    public $message, $post_id, $user_id;

    protected $listeners = ['render' => 'render'];

    public function mount(Post $post){
        $this->post = $post;
        $this->post_id = Post::where('id', '=', $post->id)
                             ->get();
    }

    public function mountComment (Comment $comment){
        $this->comment = $comment;
    }

    public function mountUser (User $user){
        $this->user_id = User::where('id', auth()->user()->id)
                             ->get();
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
