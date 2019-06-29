<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\PostTraits\Property;
use App\Models\PostTraits\Relationship;

class Post extends Model
{
    use Property,Relationship;
    
    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'view',
        'status'
    ];
}
