<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    public function profil()
    {
        return $this->hasOne('App\profil');
    }
}
