<?php

namespace App\Policies;

use App\Models\Drive;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DrivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Drive $drive)
    {
        if ($drive->status == FALSE) {
            return FALSE;
        } elseif ($user->isAdministrator() or ($user->id == $drive->user_id and $user->isUser())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user) {
        if (Drive::where('user_id', $user->id)->where('status', FALSE)->exists()) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function store(User $user)
    {
        if (Drive::where('user_id', $user->id)->where('status', FALSE)->exists()) {
            return FALSE;
        } elseif ($user->isUser() or $user->isAdministrator()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Drive $drive)
    {
        if ($drive->status) {
            return FALSE;
        } elseif ($user->id == $drive->user_id) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Drive $drive)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Drive $drive)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Drive $drive)
    {
        //
    }
}
