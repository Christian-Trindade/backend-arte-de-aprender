<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subjects';
    public $timestamps = true;

    protected $fillable = [
        'name','color'
    ];
}
