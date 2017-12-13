<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function vote()
    {
        return $this->hasMany(Vote::class);
    }
}
