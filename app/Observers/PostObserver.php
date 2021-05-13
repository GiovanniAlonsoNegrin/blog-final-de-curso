<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        if (! \App::runningInConsole()) { //Si no se está ejecutando desde la consola.
            $post->user_id = auth()->user()->id; //Cada vez que se cree un nuevo post se la asigna al campo user_id el id del usuario autenticado.
        }
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    // public function deleting(Post $post) //Se activa justo antes de eliminar el post.
    // {
    //     if ($post->image) {
    //         Storage::delete($post->image->url); //Cada vea que se elimine un post se elimina su imagen.
    //     }
    // }
}
