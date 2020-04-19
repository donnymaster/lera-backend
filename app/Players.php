<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $table = 'players';

    public function kind_sport()
    {
        return $this->belongsTo(KindSport::class);
    }
}
