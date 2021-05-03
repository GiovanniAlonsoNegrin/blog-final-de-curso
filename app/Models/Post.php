<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Relatios

    // One to many reverse
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    // Many to many
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    // One tu one polimorphic
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
