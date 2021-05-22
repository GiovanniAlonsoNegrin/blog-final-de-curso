<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentAnswer extends Component
{
    public $open = false;
    
    public $comment;

    protected $rules = [
        'comment.message' => 'required',
        'comment.id' => 'required'
    ];

    public function mount(Comment $comment){
        $this->comment = $comment;
    }

    public function save(){
        $this->validate(); //reglas de validación.
        $this->comment->save(); //guarda el comentario actualizado y lo manda a la base de datos.

        $this->reset(['open']); //resetea nuestro modal.
        $this->emit('render'); //Renderiza el componente commets para ver el comentario actualizado.

        // $this->emit('alert', 'El post se actualizó con éxito'); //Muestra un alert de confirmación.
    }

    public function render()
    {
        return view('livewire.comment-answer');
    }
}
