<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Answer;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{   
    public $post;

    public $message, $post_id ,$user_id;
    public $answers;
    public $answer;
    public $comments, $respuesta;

    protected $rules = [
        'message' => 'required'
    ];
    protected $listeners = ['render'];

    public function mount(Post $post){
        $this->post = $post;
        $this->answers = Answer::all();
        $this->comments = Comment::all();
        // $this->answers = $answer->message;
        // $this->comment_id = $comment->id;
    
        $this->post_id = $post->id;
        if (Auth::guest()) {
            
        } else {
            $this->user_id = Auth::user()->id;
        }
        
    }

    public function answers(Answer $answer){
        // $this->answers = $answer;
        
        // $this->answer = Answer::message();
        $this->comment_id = $comment->id;

        
    }

    public function save(){
        $this->validate();

        Comment::create([
            'message' => $this->message,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id
        ]);

        $this->reset(['message']); //reseta el mensaje del comentario

        $this->emit('alert', 'Tu comentario se creó con éxito!');
        
        $this->render();
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
