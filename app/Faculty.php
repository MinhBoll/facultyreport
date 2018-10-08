<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function books(){
        return $this->hasMany('App\Book');
    }
}
