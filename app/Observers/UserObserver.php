<?php

namespace App\Observers;

use App\Models\Car;
use App\Models\CarManufacturer;
use App\Models\Drive;
use App\Models\User;
use App\Models\UserRole;
use function Pest\Laravel\delete;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $keys1 = UserRole::where('user_id', '=', $user->id)->get()->pluck('id');
        UserRole::destroy($keys1);

        $keys2 = CarManufacturer::where('user_id', '=', $user->id)->get()->pluck('id');
        CarManufacturer::destroy($keys2);

        $keys3 = Car::where('user_id', '=', $user->id)->get()->pluck('id');
        Car::destroy($keys3);

        $keys4 = Drive::where('user_id', '=', $user->id)->get()->pluck('id');
        Drive::destroy($keys4);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
