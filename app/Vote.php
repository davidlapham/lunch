<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }
}
