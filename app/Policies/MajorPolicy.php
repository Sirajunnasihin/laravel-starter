<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Major;
use Illuminate\Auth\Access\HandlesAuthorization;

class MajorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the major can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list majors');
    }

    /**
     * Determine whether the major can view the model.
     */
    public function view(User $user, Major $model): bool
    {
        return $user->hasPermissionTo('view majors');
    }

    /**
     * Determine whether the major can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create majors');
    }

    /**
     * Determine whether the major can update the model.
     */
    public function update(User $user, Major $model): bool
    {
        return $user->hasPermissionTo('update majors');
    }

    /**
     * Determine whether the major can delete the model.
     */
    public function delete(User $user, Major $model): bool
    {
        return $user->hasPermissionTo('delete majors');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete majors');
    }

    /**
     * Determine whether the major can restore the model.
     */
    public function restore(User $user, Major $model): bool
    {
        return false;
    }

    /**
     * Determine whether the major can permanently delete the model.
     */
    public function forceDelete(User $user, Major $model): bool
    {
        return false;
    }
}
