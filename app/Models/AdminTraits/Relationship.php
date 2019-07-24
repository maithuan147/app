<?php

namespace App\Models\PostTraits;

use App\Role;

trait Relationship{
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}