<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearchRequest;
use App\Models\Car;
use App\Models\Drive;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index () {
        $users = User::all();
        $cars = Car::all();
        $aPoints = Drive::select('point_a')->orderByDesc('id')->get()->pluck('point_a')->unique();
        $bPoints = Drive::select('point_b')->orderByDesc('id')->get()->pluck('point_b')->unique();
        return view('_lvz.search-index', ['users' => $users, 'cars' => $cars, 'aPoints' => $aPoints, 'bPoints' => $bPoints]);
    }

    public function store (StoreSearchRequest $request) {
        $drives = Drive::where('created_at', '>=', $request->searchStart)->where('created_at', '<=', $request->searchEnd);
        if ($request->searchUserId) {
            $drives = $drives->where('user_id', '=', $request->searchUserId);
        }
        if ($request->searchCarId) {
            $drives = $drives->where('car_id', '=', $request->searchCarId);
        }
        if ($request->searchPointA) {
            $drives = $drives->where('point_a', '=', $request->searchPointA);
        }
        if ($request->searchPointB) {
            $drives = $drives->where('point_b', '=', $request->searchPointB);
        }
        if ($drives->exists()) {
            return view('_lvz.search-store', ['drives' => $drives->orderBy('id', 'desc')->get()]);
        } else {
            return back()->withErrors([
                'status' => 'Ничего не найдено'
            ])->withInput();
        }
    }
}
