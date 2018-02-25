<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function option(){

      return $this->belongsTo('App\Option');

   	}

   	public function user(){

      return $this->belongsTo('App\User');

   	}

}
