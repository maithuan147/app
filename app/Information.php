<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'address',
        'logo',
        'textfooter',
        'status',
        'facebook',
        'google',
        'instagram',
    ];
}
