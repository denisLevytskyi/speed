<?php

namespace App\Observers;

use App\Models\Drive;
use App\Notifications\EndDrive;
use Illuminate\Support\Facades\Auth;

class DriveObserver
{
    /**
     * Handle the Drive "created" event.
     *
     * @param  \App\Models\Drive  $drive
     * @return void
     */
    public function created(Drive $drive)
    {
        //
    }

    /**
     * Handle the Drive "updated" event.
     *
     * @param  \App\Models\Drive  $drive
     * @return void
     */
    public function updated(Drive $drive)
    {
        Auth::user()->notify(new EndDrive($drive));
    }

    /**
     * Handle the Drive "deleted" event.
     *
     * @param  \App\Models\Drive  $drive
     * @return void
     */
    public function deleted(Drive $drive)
    {
        //
    }

    /**
     * Handle the Drive "restored" event.
     *
     * @param  \App\Models\Drive  $drive
     * @return void
     */
    public function restored(Drive $drive)
    {
        //
    }

    /**
     * Handle the Drive "force deleted" event.
     *
     * @param  \App\Models\Drive  $drive
     * @return void
     */
    public function forceDeleted(Drive $drive)
    {
        //
    }
}
