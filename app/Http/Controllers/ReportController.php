<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Car;
use App\Models\Drive;
use App\Models\DriveList;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index () {
        $users = User::all();
        $cars = Car::all();
        $aPoints = Drive::select('point_a')->orderByDesc('id')->get()->pluck('point_a')->unique();
        $bPoints = Drive::select('point_b')->orderByDesc('id')->get()->pluck('point_b')->unique();
        return view('_lvz.report-index', ['users' => $users, 'cars' => $cars, 'aPoints' => $aPoints, 'bPoints' => $bPoints]);
    }

    public function store (StoreReportRequest $request) {
        $drives = Drive::where('status', TRUE);
        if ($request->reportStart) {
            $drives = $drives->where('created_at', '>=', $request->reportStart);
        }
        if ($request->reportEnd) {
            $drives = $drives->where('created_at', '<=', $request->reportEnd);
        }
        if ($request->reportUserId) {
            $drives = $drives->where('user_id', '=', $request->reportUserId);
        }
        if ($request->reportCarId) {
            $drives = $drives->where('car_id', '=', $request->reportCarId);
        }
        if ($request->reportPointA) {
            $drives = $drives->where('point_a', '=', $request->reportPointA);
        }
        if ($request->reportPointB) {
            $drives = $drives->where('point_b', '=', $request->reportPointB);
        }
        if ($drives->exists()) {
            $drives = $drives->orderBy('id', 'desc')->get();
            $list = DriveList::whereIn('drive_id', $drives->pluck('id'))->get();
        } else {
            return back()->withErrors([
                'status' => 'Ничего не найдено'
            ])->withInput();
        }
        $data = [
            'start' => $request->reportStart,
            'end' => $request->reportEnd,
            'user' => User::find($request->reportUserId),
            'car' => Car::find($request->reportCarId),
            'pointA' => $request->reportPointA,
            'pointB' => $request->reportPointB,
            'count' => $drives->count(),
            'packets' => $list->count(),
            'distance' => $list->sum('distance'),
            'time' => $list->sum('time'),
            'speed' => $list->max('speed'),
            'drives' => $drives,
        ];
        return view('_lvz.report-store', ['data' => $data]);
    }
}
