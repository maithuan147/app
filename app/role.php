<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoleTraits\Property;

class role extends Model
{
    use Property;

    protected $fillable = [
        'name', 'permissions', 'password',
    ];
}
