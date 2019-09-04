<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\ProductTraits\CategoryTraits\Property;
use App\Models\ProductTraits\CategoryTraits\Relationship;

class categoryProduct extends Model
{
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
