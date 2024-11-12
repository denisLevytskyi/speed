<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index () {
        $users = User::all();
        $cars = Car::all();
        return view('_lvz.report-index', ['users' => $users, 'cars' => $cars]);
    }

    public function store (StoreReportRequest $request) {
        if ($request->reportUserId) {
            $model = User::find($request->reportUserId);
        } elseif ($request->reportCarId) {
            $model = Car::find($request->reportCarId);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка параметров запроса'
            ])->withInput();
        }
        $data = [
            'start' => $request->reportStart,
            'end' => $request->reportEnd,
        ];
        $drive = $model->drive()->where('drives.created_at', '>=', $data['start'])->where('drives.created_at', '<=', $data['end'])->where('drives.status', TRUE);
        $list = $model->list()->where('drives.created_at', '>=', $data['start'])->where('drives.created_at', '<=', $data['end'])->where('drives.status', TRUE);
        $data['drives'] = $drive->count();
        $data['packets'] = $list->count();
        $data['distance'] = $list->sum('distance');
        $data['time'] = $list->sum('time');
        $data['speed'] = $list->max('speed');
        $data['list'] = $drive->paginate((int) $this->prop->getProp('app_paginator'));
        if ($data['drives']) {
            return view('_lvz.report-store', ['data' => $data]);
        } else {
            return back()->withErrors([
                'status' => 'Ничего не найдено'
            ])->withInput();
        }
    }
}
