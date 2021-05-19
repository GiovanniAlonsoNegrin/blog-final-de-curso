<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentEdit extends Component
{
    public function render()
    {
        $comment = Comment::all();

        return view('livewire.comment-edit', compact('comment'));
    }
}
