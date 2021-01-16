<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    //
    protected $table = 'achievements';
    public $timestamps = true;

    protected $fillable = [
        'name', 'image',
    ];
}
