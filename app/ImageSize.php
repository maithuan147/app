<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageSize extends Model
{
    protected $fillable = [
        'width',
        'height'
    ];
}
