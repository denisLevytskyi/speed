<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use phpDocumentor\Reflection\Types\Self_;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('_lvz/car-index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('_lvz/car-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreCarRequest $request)
    {
        if ($request->user()->cannot('create', Car::class)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        $data = [
            'user_id' => $request->user()->id,
            'manufacturer' => $request->CarCreateManufacturer,
            'model' => $request->CarCreateModel,
            'number' => $request->CarCreateNumber,
            'color' => $request->CarCreateColor,
            'fuel' => $request->CarCreateFuel,
            'year' => $request->CarCreateYear
        ];
        if (Car::create($data)) {
            return redirect(route('app.car.index'));
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
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
        return view('_lvz/car-edit', ['car' => $car]);
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
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        $data = [
            'manufacturer' => $request->CarEditManufacturer,
            'model' => $request->CarEditModel,
            'number' => $request->CarEditNumber,
            'color' => $request->CarEditColor,
            'fuel' => $request->CarEditFuel,
            'year' => $request->CarEditYear
        ];
        $result = $car->update($data);
        if ($result) {
            return back()->with(['status' => 'Обновлено']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
