<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Classroom;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the faculty can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list classrooms');
    }

    /**
     * Determine whether the faculty can view the model.
     */
    public function view(User $user, Classroom $model): bool
    {
        return $user->hasPermissionTo('view classrooms');
    }

    /**
     * Determine whether the faculty can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create classrooms');
    }

    /**
     * Determine whether the faculty can update the model.
     */
    public function update(User $user, Classroom $model): bool
    {
        return $user->hasPermissionTo('update classrooms');
    }

    /**
     * Determine whether the faculty can delete the model.
     */
    public function delete(User $user, Classroom $model): bool
    {
        return $user->hasPermissionTo('delete classrooms');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete classrooms');
    }

    /**
     * Determine whether the faculty can restore the model.
     */
    public function restore(User $user, Classroom $model): bool
    {
        return false;
    }

    /**
     * Determine whether the faculty can permanently delete the model.
     */
    public function forceDelete(User $user, Classroom $model): bool
    {
        return false;
    }
}
