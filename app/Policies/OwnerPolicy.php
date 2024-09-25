<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Owner;

class OwnerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function disable(User $user)
{
    return $user->role === 'admin';
}

}
