<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function kind_sport()
    {
        return $this->belongsTo(KindSport::class);
    }

    public function players()
    {
        return $this->hasOne(Teams::class);
    }
}
