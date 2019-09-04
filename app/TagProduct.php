<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\ProductTraits\TagTraits\Property;
use App\Models\ProductTraits\TagTraits\Relationship;

class tagProduct extends Model
{
    protected $table = 'tag_products';
    use Sluggable,Property,Relationship;
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
