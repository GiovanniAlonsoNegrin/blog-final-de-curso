<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        // $maxPost = Post::max('id');

        // $posts = Post::orderBy('id', 'desc')->paginate($maxPost);
        $posts = Post::where('name', 'LIKE', '%' . $this->search . '%')
                     ->latest('id')
                     ->paginate();

        return view('livewire.admin.all-post-index', compact('posts'));
    }
}
