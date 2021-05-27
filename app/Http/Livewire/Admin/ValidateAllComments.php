<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

class ValidateAllComments extends Component
{
    public $post;

    public function mount(Post $post){
        $this->post = $post;
    }

    public function save(){
        $this->post->comment->save();
    }

    public function render()
    {
        return view('livewire.admin.validate-all-comments');
    }
}
