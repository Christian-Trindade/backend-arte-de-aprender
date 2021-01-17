<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    //
    protected $table = 'audio';
    public $timestamps = true;

    protected $fillable = [
        'topic_id', 'user_id', 'beat_id','url'
    ];
}
