<?php

namespace App\Models\RoleTraits;

use App\User;

trait Relationship{
    public function users()
    {
        return $this->hasMany(User::class);
    }

}