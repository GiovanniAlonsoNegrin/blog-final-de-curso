<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class SecondPostIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->paginate();

        return view('livewire.admin.second-post-index', compact('posts'));
    }
}
