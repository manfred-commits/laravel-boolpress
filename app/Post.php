<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content'];
    
    // method with the entity with which we need to establish a relation
    public function category(){
        return $this->belongsTo("App/Category");
    }
}
