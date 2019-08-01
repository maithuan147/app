<?php

namespace App\Models\PageTraits;

use App\User;

trait Relationship{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}