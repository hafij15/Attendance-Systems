<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    //
    protected $fillable = [
        'class', 'subject','roll','date','attendence',
    ];
}
