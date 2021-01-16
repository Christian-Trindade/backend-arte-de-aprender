<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeatCategory extends Model
{
    //
    protected $table = 'beat_categories';
    public $timestamps = true;

    protected $fillable = [
        'name', 'active'
    ];
}
