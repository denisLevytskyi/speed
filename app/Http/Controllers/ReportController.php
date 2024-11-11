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
        $data['drives'] = $model->drive()->where('drives.created_at', '>=', $data['start'])->where('drives.created_at', '<=', $data['end'])->count();
        $data['packets'] = $model->list()->where('drive_lists.created_at', '>=', $data['start'])->where('drive_lists.created_at', '<=', $data['end'])->count();
        $data['distance'] = $model->list()->where('drive_lists.created_at', '>=', $data['start'])->where('drive_lists.created_at', '<=', $data['end'])->sum('distance');
        $data['time'] = $model->list()->where('drive_lists.created_at', '>=', $data['start'])->where('drive_lists.created_at', '<=', $data['end'])->sum('time');
        $data['speed'] = $model->list()->where('drive_lists.created_at', '>=', $data['start'])->where('drive_lists.created_at', '<=', $data['end'])->max('speed');
        $data['list'] = $model->drive()->where('created_at', '>=', $data['start'])->where('created_at', '<=', $data['end'])->orderBy('id', 'desc')->paginate((int) $this->prop->getProp('app_paginator'));
        if ($data['drives']) {
            return view('_lvz.report-store', ['data' => $data]);
        } else {
            return back()->withErrors([
                'status' => 'Ничего не найдено'
            ])->withInput();
        }
    }
}
