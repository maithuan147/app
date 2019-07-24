<?php
namespace App\Models\UserTraits;

trait Mutator
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}