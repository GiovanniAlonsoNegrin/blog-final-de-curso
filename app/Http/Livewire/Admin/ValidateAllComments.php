<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;

class ValidateAllComments extends Component
{
    public $comments = array();

    public function mount(){
        $this->comments = Comment::where('status', 1)
                                 ->get();
    }

    public function save(){
        
        foreach ($this->comments as $comment)
        {
            $comment->status = 2;
            $comment->save();
        }

        $this->emit('alert', 'Los comentarios se validaron con éxito!');
    }
}
