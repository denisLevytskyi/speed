<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(10);
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
            'manufacturer' => $request->carCreateManufacturer,
            'model' => $request->carCreateModel,
            'number' => $request->carCreateNumber,
            'color' => $request->carCreateColor,
            'fuel' => $request->carCreateFuel,
            'year' => $request->carCreateYear
        ];
        if (Car::create($data)) {
            return redirect(route('app.car.index'))->with(['status' => 'Запись успешно добавлена']);
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
            'manufacturer' => $request->carEditManufacturer,
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
            ]);
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
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        $result = $car->delete();
        if ($result) {
            return redirect(route('app.car.index'))->with(['status' => 'Запись успешно удалена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
    }
}
