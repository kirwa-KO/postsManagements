<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // public  function    posts()
    // {
    //     return ($this->belongsToMany("App\Post")->withTimestamps());
    // }
    // because we use polymorphism
    public  function    posts()
    {
        return $this->morphedByMany("App\Post", "taggable")->withTimestamps();
    }

    public  function    users()
    {
        return $this->morphedByMany("App\User", "taggable")->withTimestamps();
    }
}
