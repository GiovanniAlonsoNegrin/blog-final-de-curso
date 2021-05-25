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
    
    protected $rules = [
        'message' => 'required'
    ];

    public function mount(Post $post){
        $this->post = $post;
        $this->post_id = $post->id;
        // $this->user_id = Auth::user()->id;
    }

    public function mountComment (Comment $comment){
        $this->comment = $comment;
    }

    public function save(){
        $this->validate();

        Comment::create([
            'message' => $this->message,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id
        ]);

        $this->reset(['message']); //reseta el mensaje del comentario

        $this->emitTo('livewire.comments', 'render');
        $this->emit('alert', 'Tu comentario se creó con éxito!');
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
