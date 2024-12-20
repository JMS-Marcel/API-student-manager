<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\Response;


class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function modify(Admin $user, Admin $admin): Response
    {
        // return $user->id === $admin->id || $admin->role === 'admin'
        return $user->id === $admin->id
        ?Response::allow()
        :Response::deny("You can't do this action");
    }
}
