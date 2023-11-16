<?php

namespace App\Policies;

use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(["Admin"]);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, State $state)
    {
        return $user->hasRole(["Admin"]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasRole(["Admin"]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, State $state)
    {
        return $user->hasRole(["Admin"]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, State $state)
    {
        return $user->hasRole(["Admin"]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, State $state)
    {
        return $user->hasRole(["Admin"]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, State $state)
    {
        return $user->hasRole(["Admin"]);
    }
}
