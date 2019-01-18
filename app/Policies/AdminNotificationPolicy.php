<?php

namespace App\Policies;

use App\Models\Auth\User;
use App\Models\AdminNotification;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminNotificationPolicy
{
    use HandlesAuthorization;

    /**
     * Почему то нужно явно указывать crud, хотя по идее before должен работать на все
     *
     */
    public function before(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function viewAny(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function view(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function update(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function create(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function delete(User $user)
    {
        return $user->hasRole('Админ');
    }
}
