<?php

namespace App;

use App\Tag;
use App\User;
use App\Category;
use App\Models\PostTraits\Property;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Property,SoftDeletes,Sluggable;
    
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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_post','post_id','categories_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
