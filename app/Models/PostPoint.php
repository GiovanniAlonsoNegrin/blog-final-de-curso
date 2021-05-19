<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPoint extends Model
{
    use HasFactory;

    protected $fillable = ['score', 'post_id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
