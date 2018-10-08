<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
