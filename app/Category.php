<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\CatagoriesTraits\Property;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\CatagoriesTraits\Relationship;


class Category extends Model
{
    // protected $table = 'categories';
    use Property,Relationship;
    
    use Sluggable {
        replicate as replicateSlug;
    }
    use NodeTrait {
        replicate as replicateNode;
    }
    public function replicate(array $except = null)
    {
        return $this->replicateNode($except);
    }


    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
        'parent_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
        ];
    }
}
