<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before(User $user){
        if ($user->role->name == 'Admin') {
            return true;
        }
    }
    public function create(User $user)
    {
        // dd($user->permissions);
        if ($user->permissions == 'create') {
            return true;
        }
    }
    public function update(User $user)
    {
        // dd($user->permissions);
        if ($user->permissions == 'update') {
            return true;
        }
    }
}
