<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Admin can update anyone who is NOT an admin, OR they can update themselves
        if ($user->isAdmin()) {
            return ! $model->isAdmin() || $user->id === $model->id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Admin can delete anyone who is NOT an admin
        // (Admin cannot delete themselves here, that's usually handled elsewhere,
        // but for safety: they can't delete other admins anyway)
        return $user->isAdmin() && ! $model->isAdmin() && $user->id !== $model->id;
    }
}
