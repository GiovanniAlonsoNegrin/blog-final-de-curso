<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Post $post){
        if ($user->id == $post->user_id OR $user->id == 1) { //Si el id del usuario es igual al id del usario que lo ha posteado.
            return true;
        } else {
            return false;
        }
        
    }

    public function published(?User $user, Post $post){ //El símbolo de interrogación nos indica que el parámetro es opcional.
        if ($post->status == 2) { //Si el estatus es igual a 2(está posteado).
            return true;
        } else {
            return false;
        }
    }
}
