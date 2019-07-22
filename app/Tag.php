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
        'slug'
    ];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
