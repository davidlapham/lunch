<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['date_last_used'];

    protected $casts = ['has_vegetarian', 'has_spicy'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
