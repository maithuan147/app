<?php

namespace App;

use App\Models\ProductTraits\Property;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductTraits\Relationship;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use Property,Relationship,SoftDeletes,Sluggable;
    protected $fillable = [
        'name_product',
        'image',
        'price_main',
        'price_sale',
        'description',
        'content',
        'slug',
        'user_id',
        'view',
        'status',
        'id_product',
        'quantity',
        'date_input',
        'unit_weight',
        'weight',
        'unit_size',
        'size'
    ];

    public function sluggable()
    {
        return [
            'name_product' => [
                'source' => 'name_product'
            ],
            'slug' => [
                'source' => 'name_product'
            ]
            
        ];
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}
