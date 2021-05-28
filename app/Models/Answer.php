<?php

namespace App\Models;

use App\Models\Post;

use App\Models\Comment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['message','user_id','comment_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->belongsTo(Comment::class);
    }

}