<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\CatagoriesTraits\Property;
use App\Models\CatagoriesTraits\Relationship;

class Categories extends Model
{
    use Property,Relationship;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status'
    ];
}
