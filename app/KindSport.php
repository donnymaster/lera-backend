<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KindSport extends Model
{
    use SoftDeletes;

    protected $table = 'kind_sports';

    protected $fillable = ['name_kind_sport'];

    public function teams()
    {
        return $this->hasOne(Teams::class);
    }

    public function players()
    {
        return $this->hasOne(Teams::class);
    }
}