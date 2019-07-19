<?php

namespace App;

use App\Models\PostTraits\Property;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostTraits\Relationship;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Property,Relationship,SoftDeletes,Sluggable;
    
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'content',
        'slug',
        'view',
        'status',
        'user_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
            'title' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}
