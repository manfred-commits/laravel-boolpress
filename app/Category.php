<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ['name'];

    // method with the entity with which we need to establish a relation
    public function posts(){
        return $this->hasMany("App\Post");
    }
}
