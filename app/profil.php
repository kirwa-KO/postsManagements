<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    public function author()
    {
        return $this->belongsTo('App\author');
    }
}
