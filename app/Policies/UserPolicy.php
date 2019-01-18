<?php

namespace App\Policies;

use App\Models\Auth\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function view(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function create(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function update(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function delete(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function restore(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function forceDelete(User $user)
    {
        return $user->hasRole('Админ');
    }
}
