<?php

namespace App\Http\Controllers;

use App\Models\CarManufacturer;
use App\Http\Requests\StoreCarManufacturerRequest;
use App\Http\Requests\UpdateCarManufacturerRequest;

class CarManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarManufacturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarManufacturerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(CarManufacturer $carManufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(CarManufacturer $carManufacturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarManufacturerRequest  $request
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarManufacturerRequest $request, CarManufacturer $carManufacturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarManufacturer $carManufacturer)
    {
        //
    }
}
