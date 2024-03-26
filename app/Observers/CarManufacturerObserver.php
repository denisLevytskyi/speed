<?php

namespace App\Observers;

use App\Models\Car;
use App\Models\CarManufacturer;

class CarManufacturerObserver
{
    /**
     * Handle the CarManufacturer "created" event.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return void
     */
    public function created(CarManufacturer $carManufacturer)
    {
        //
    }

    /**
     * Handle the CarManufacturer "updated" event.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return void
     */
    public function updated(CarManufacturer $carManufacturer)
    {
        //
    }

    /**
     * Handle the CarManufacturer "deleted" event.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return void
     */
    public function deleted(CarManufacturer $carManufacturer)
    {
        $keys = Car::where('manufacturer_id', '=', $carManufacturer->id)->get()->pluck('id');
        Car::destroy($keys);
    }

    /**
     * Handle the CarManufacturer "restored" event.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return void
     */
    public function restored(CarManufacturer $carManufacturer)
    {
        //
    }

    /**
     * Handle the CarManufacturer "force deleted" event.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return void
     */
    public function forceDeleted(CarManufacturer $carManufacturer)
    {
        //
    }
}
