<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    use HandlesAuthorization;

    public function commentPublished(?User $user, Comment $comment){ //El símbolo de interrogación nos indica que el parámetro es opcional.
        if ($comment->status == 2) { //Si el estatus es igual a 2(está comentado).
            return true;
        } else {
            return false;
        }
    }
}
