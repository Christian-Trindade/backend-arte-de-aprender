<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table = 'topics';
    public $timestamps = true;

    protected $fillable = [
        'subject_id','name','content'
    ];
}
