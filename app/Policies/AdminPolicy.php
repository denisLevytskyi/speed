<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, User $current) {
        if ($user->isAdministrator() and !$current->isAdministrator()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
