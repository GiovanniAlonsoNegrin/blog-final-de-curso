<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relations

    // One to many reverse
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function point(){
        return $this->belongsTo(PostPoint::class);
    }

    //One to many    
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function points(){
        return $this->hasMany(PostPoint::class);
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
