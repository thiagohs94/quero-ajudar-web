<?php

namespace App\Policies;

use App\Cause;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CausePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any causes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return mixed
     */
    public function view(User $user, Cause $cause)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create causes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return mixed
     */
    public function update(User $user, Cause $cause)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return mixed
     */
    public function delete(User $user, Cause $cause)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return mixed
     */
    public function restore(User $user, Cause $cause)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the cause.
     *
     * @param  \App\User  $user
     * @param  \App\Cause  $cause
     * @return mixed
     */
    public function forceDelete(User $user, Cause $cause)
    {
        return $user->isAdmin();
    }
}
