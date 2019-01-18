<?php

namespace App\Policies;

use App\Models\Auth\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasAnyRole(['Админ', 'Главный брокер', 'Брокер-покупатель', 'Брокер-продавец']);
    }

    public function view(User $user)
    {
        return $user->hasRole(['Админ', 'Главный брокер', 'Брокер-покупатель', 'Брокер-продавец']);
    }

    public function create(User $user)
    {
        return $user->hasRole('Админ');
    }

    public function update(User $user)
    {
        return $user->hasRole(['Админ', 'Главный брокер', 'Брокер-покупатель', 'Брокер-продавец']);
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
