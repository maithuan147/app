<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    protected $table = 'categories_post';

    protected $fillable = [
        'post_id',
        'categories_id'
    ];
}
