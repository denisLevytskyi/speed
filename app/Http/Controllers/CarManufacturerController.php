<?php

namespace App\Http\Controllers;

use App\Models\CarManufacturer;
use App\Http\Requests\StoreCarManufacturerRequest;
use App\Http\Requests\UpdateCarManufacturerRequest;
use Illuminate\Http\Request;

class CarManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $manufacturers = CarManufacturer::paginate(10);
        return view('_lvz/car-manufacturer-index', ['manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('_lvz/car-manufacturer-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarManufacturerRequest  $request
     */
    public function store(StoreCarManufacturerRequest $request)
    {
        if ($request->user()->cannot('create', CarManufacturer::class)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ])->withInput();
        }
        $data = [
            'user_id' => $request->user()->id,
            'mark' => $request->carManufacturerCreateMark
        ];
        if (CarManufacturer::create($data)) {
            return redirect(route('app.car-manufacturer.index'))->with(['status' => 'Запись успешно добавлена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarManufacturer  $carManufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(CarManufacturer $car_manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(CarManufacturer $car_manufacturer)
    {
        return view('_lvz/car-manufacturer-edit', ['car_manufacturer' => $car_manufacturer]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateCarManufacturerRequest $request, CarManufacturer $car_manufacturer)
    {
        if ($request->user()->cannot('update', $car_manufacturer)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        $data = [
            'mark' => $request->carManufacturerEditMark
        ];
        if ($car_manufacturer->update($data)) {
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
    public function destroy(Request $request, CarManufacturer $car_manufacturer)
    {
        if ($request->user()->cannot('delete', $car_manufacturer)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        $result = $car_manufacturer->delete();
        if ($result) {
            return redirect(route('app.car-manufacturer.index'))->with(['status' => 'Запись успешно удалена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
    }
}
