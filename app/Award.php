<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    public function award(){
        return $this->belongsTo('App\Faculty');
    }
}
