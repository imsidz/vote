<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function options(){

        return $this->hasMany('App\Option');
    
    }
}
