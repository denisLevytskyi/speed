<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\CarManufacturer;
use App\Models\Drive;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate((int) $this->prop->getProp('app_paginator'));
        return view('_lvz.car-index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $manufacturers = CarManufacturer::all();
        return view('_lvz.car-create', ['manufacturers' => $manufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreCarRequest $request)
    {
        if ($request->user()->cannot('create', Car::class)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ])->withInput();
        }
        $data = [
            'user_id' => $request->user()->id,
            'manufacturer_id' => $request->carCreateManufacturerId,
            'model' => $request->carCreateModel,
            'number' => $request->carCreateNumber,
            'color' => $request->carCreateColor,
            'fuel' => $request->carCreateFuel,
            'year' => $request->carCreateYear,
        ];
        if (Car::create($data)) {
            return to_route('app.car.index')->with(['status' => 'Запись успешно добавлена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     */
    public function edit(Car $car)
    {
        $manufacturers = CarManufacturer::all();
        return view('_lvz.car-edit', ['car' => $car, 'manufacturers' => $manufacturers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        if ($request->user()->cannot('update', $car)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ])->withInput();
        }
        $data = [
            'manufacturer_id' => $request->carEditManufacturerId,
            'model' => $request->carEditModel,
            'number' => $request->carEditNumber,
            'color' => $request->carEditColor,
            'fuel' => $request->carEditFuel,
            'year' => $request->carEditYear
        ];
        if ($car->update($data)) {
            return back()->with(['status' => 'Обновлено']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(Request $request, Car $car)
    {
        if ($request->user()->cannot('delete', $car)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ]);
        }
        if ($this->haveChild(new Drive(), 'car_id', $car->id)) {
            return back()->withErrors([
                'status' => 'У записи есть зависимые элементы'
            ]);
        }
        $result = $car->delete();
        if ($result) {
            return to_route('app.car.index')->with(['status' => 'Запись успешно удалена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
    }
}
