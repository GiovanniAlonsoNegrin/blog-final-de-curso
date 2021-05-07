<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Eloquent\Builder;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::all();
        // $user = User::whereHasMorph(
        //     'Roleable',
        //     [Role::class],
        //     function (Builder $query) {
        //         $query->where('name');
        //     }
        // )->get();

        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                     ->orWhere('email', 'LIKE', '%' . $this->search . '%')->paginate();

        return view('livewire.admin.users-index', compact('users', 'roles'));
    }
}
