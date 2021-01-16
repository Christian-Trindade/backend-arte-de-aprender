<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AchievementUser extends Model
{
    //
    protected $table = 'achievement_users';
    public $timestamps = true;

    protected $fillable = [
        'achievement_id', 'user_id',
    ];
}
