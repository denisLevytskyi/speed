<?php

namespace App\Observers;

use App\Models\Drive;
use App\Models\DriveList;
use App\Models\Prop;
use App\Models\User;
use App\Notifications\EndDrive;
use App\Notifications\StartDrive;
use Illuminate\Support\Facades\Auth;

class DriveObserver
{
    public function __construct(public Prop $prop) {}

    /**
     * Handle the Drive "created" event.
     *
     * @param  \App\Models\Drive  $drive
     * @return void
     */
    public function created(Drive $drive)
    {
        if (rand(1, 100) > (int) $this->prop->getProp('sms_chance')) {
            return;
        }
        if($user = User::where('name', '=', $this->prop->getProp('sms_name'))->first()) {
            $user->notify(new StartDrive());
        }
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
        $keys = DriveList::where('drive_id', '=', $drive->id)->get()->pluck('id');
        DriveList::destroy($keys);
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
