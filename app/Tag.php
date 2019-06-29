<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\TagTraits\Property;
use App\Models\TagTraits\Relationship;

class Tag extends Model
{
    use Property,Relationship;
    protected $fillable = [
        'name',
    ];
}
