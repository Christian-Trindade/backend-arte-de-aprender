<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement_user extends Model
{
    //
    protected $table = 'achievements';
    public $timestamps = true;

    protected $fillable = [
        'achievement_id', 'user_id',
    ];
}
