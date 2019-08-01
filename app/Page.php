<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\PageTraits\Property;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\PageTraits\Relationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use Property,Relationship,SoftDeletes;
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
        'title',
        'description',
        'slug',
        'status',
        'image',
        'content',
        'user_id',
        'tembplate',
        'parent_id',
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
