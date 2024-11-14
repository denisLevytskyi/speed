<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Drive;
use App\Http\Requests\StoreDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DriveController extends Controller
{
    public function terminal() {
        $drives = Drive::where('status', FALSE)->with('list')->get();
        return response()->json($drives);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $drives = Drive::where('status', TRUE)->orderBy('id', 'desc')->paginate((int) $this->prop->getProp('app_paginator'));
        $current = Drive::where('user_id', Auth::user()->id)->where('status', FALSE)->first();
        return view('_lvz.drive-index', ['drives' => $drives, 'current' => $current]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Drive::class)) {
            return to_route('app.drive.index')->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ]);
        }
        $cars = Car::all();
        $points = Drive::select('point_b')->where('user_id', '=', Auth::user()->id)->orderByDesc('id')->get()->pluck('point_b')->unique();
        return view('_lvz.drive-create', ['cars' => $cars, 'points' => $points]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreDriveRequest $request)
    {
        if ($request->user()->cannot('store', Drive::class)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
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
            return to_route('app.drive.index')->with(['status' => 'Запись успешно добавлена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Request $request, Drive $drive)
    {
        if (Route::currentRouteName() == 'app.drive.show.check') {
            $view = '_lvz.drive-show-check';
        } else {
            $view = '_lvz.drive-show-map';
        }
        if ($request->user()->cannot('view', $drive)) {
            return to_route('app.drive.index')->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ]);
        }
        return view($view, ['drive' => $drive, 'prop' => $this->prop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Request $request, Drive $drive)
    {
        if ($request->user()->cannot('update', $drive)) {
            return to_route('app.drive.index')->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ]);
        }
        return view('_lvz.drive-edit', ['drive' => $drive, 'prop' => $this->prop]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateDriveRequest $request, Drive $drive)
    {
        if ($request->user()->cannot('update', $drive)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие'
            ]);
        }
        if (!$drive->hasData())  {
            return back()->withErrors([
               'status' => 'Для завершения нужно хотя-бы одна запись'
            ]);
        } elseif ($drive->update(['status' => TRUE])) {
            return to_route('app.drive.index')->with(['status' => 'Поездка завершена']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
        }
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
