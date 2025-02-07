<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function user( ){
        return $this->belongsto(User::class);
        }
    public function category( ){
        return $this->belongsto(Category::class);
        }
        
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable'); 
    }
    public function image(){
        return $this->morphOne(Image::class, 'imageable'); 
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable'); 
    }
}
