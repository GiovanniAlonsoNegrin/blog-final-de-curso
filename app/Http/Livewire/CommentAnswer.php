<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Answer;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentAnswer extends Component
{
    public $open = false;
    public $answer;
    public $comment;
    public $answerUser;
    public $comment_id, $message, $post_id, $user_id, $user_name;
    

    protected $rules = [
        'comment.message' => 'required'
    ];
    public function mountComment(Comment $comment){
            $this->comment = Comment::all();
            $this->comment_id = $comment->id;
        }
        
    public function mount(Answer $answer, Answer $answerUser, Comment $comment, User $user_name, User $user_id){
        $this->answer = $answer;
        $this->comment_id = $comment->id;
        $this->answerUser = $answer->user_id;
        if ($user_id == $answerUser) {
            $this->user_name = $user->name;
        } else {
            
        }
        
        if (Auth::guest()) {
            
        } else {
            $this->user_id = Auth::user()->id;
        }
        
    }
      
   
    // public function mount(Comment $comment){
    //     $this->comment = $comment;
    // }

    // public function mountAnswer(Answer $answer){
    //     $this->answer = $answer;
    // }

    public function save(){

        $this->validate(); //reglas de validación.

        Answer::create([
            'message' => $this->message,
            'user_id' => $this->user_id,
            'comment_id' => $this->comment_id,
        ]);
        $this->reset(['open']); //resetea nuestro modal.
        
        $this->emitTo('livewire.comments','render'); //Renderiza el componente commets para ver el comentario actualizado.
        
        $this->emit('alert', 'La Respuesta se envio con éxito'); //Muestra un alert de confirmación.
    }

    public function render()
    {
        return view('livewire.comment-answer');
    }
}
