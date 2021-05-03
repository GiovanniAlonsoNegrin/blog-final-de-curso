<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'color'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relations
    //Many to many
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
