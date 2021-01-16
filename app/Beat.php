<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beat extends Model
{
    //
    protected $table = 'beats';
    public $timestamps = true;

    protected $fillable = [
        'beat_category_id', 'name', 'url',
    ];
}
