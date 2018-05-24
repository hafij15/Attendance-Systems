<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $fillable = [
        'admin_name', 'email_address', 'admin_password',
    ];
}
