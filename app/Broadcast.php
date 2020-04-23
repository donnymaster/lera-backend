<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Broadcast extends Model
{
    protected $table = 'broadcasts';

    protected $fillable = ['name', 'team_id_1', 'team_id_2', 'url_video', 'status', 'video_start_date', 'video_start_time', 'logo'];

    public function team_1(){
        return $this->hasOne(Teams::class, 'id', 'team_id_1');
    }
    public function team_2(){
        return $this->hasOne(Teams::class, 'id', 'team_id_2');
    }
}
