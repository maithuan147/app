<?php

namespace App;

use App\Models\RoleTraits\Property;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class role extends Model
{
    use Property,Sluggable;

    protected $fillable = [
        'name', 'permissions', 'description', 'create_by'
    ];
    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'name'
            ],
        ];
    }
}
