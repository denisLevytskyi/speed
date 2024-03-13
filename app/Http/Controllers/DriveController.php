<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Drive;
use App\Http\Requests\StoreDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use Illuminate\Support\Facades\Auth;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $drives = Drive::where('status', TRUE)->orderBy('id', 'desc')->paginate(10);
        $current = Drive::where('user_id', Auth::user()->id)->where('status', FALSE)->first();
        return view('_lvz/drive-index', ['drives' => $drives, 'current' => $current]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if (Auth::user()->cannot('create', Drive::class)) {
            return redirect(route('app.drive.index'))->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        $cars = Car::all();
        return view('_lvz/drive-create', ['cars' => $cars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreDriveRequest $request)
    {
        if ($request->user()->cannot('store', Drive::class)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ])->withInput();
        }
        $data = [
            'user_id' => $request->user()->id,
            'car_id' => $request->driveCreateCarId,
            'point_a' => $request->driveCreatePointA,
            'point_b' => $request->driveCreatePointB,
            'odometer' => $request->driveCreateOdometer,
        ];
        if (Drive::create($data)) {
            return redirect(route('app.drive.index'))->with(['status' => 'Запись успешно добавлена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Drive $drive)
    {
        if (Auth::user()->cannot('view', $drive)) {
            return redirect(route('app.drive.index'))->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
        dd(1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Drive $drive)
    {
        if (Auth::user()->cannot('update', $drive)) {
            return redirect(route('app.drive.index'))->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriveRequest  $request
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriveRequest $request, Drive $drive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drive $drive)
    {
        //
    }
}
