<?php

namespace App;

use App\Models\TagTraits\Property;
use App\Models\TagTraits\Relationship;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Property,Relationship,Sluggable;
    protected $fillable = [
        'name',
        'parent_id',
        'slug'
    ];
    
    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'name'
            ],
            'slug' => [
                'slug' => 'slug'
            ]
        ];
    }
}
