<?php

namespace App\Http\Controllers;

use App\Models\Prop;
use App\Http\Requests\StorePropRequest;
use App\Http\Requests\UpdatePropRequest;

class PropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Prop $prop)
    {
        return view('_lvz/prop-index', ['prop' => $prop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(UpdatePropRequest $request)
    {
        $data = [
            ['key' => 'show_org_name', 'value' => $request->propEditOrgName],
            ['key' => 'show_sub_name', 'value' => $request->propEditSubName],
            ['key' => 'show_sub_address_1', 'value' => $request->propEditSubAddress1],
            ['key' => 'show_sub_address_2', 'value' => $request->propEditSubAddress2],
            ['key' => 'show_id', 'value' => $request->propEditId],
            ['key' => 'show_nn', 'value' => $request->propEditNn],
            ['key' => 'show_version', 'value' => $request->propEditVersion],
            ['key' => 'show_assembly', 'value' => $request->propEditAssembly],
            ['key' => 'drive_min_speed', 'value' => $request->propEditMinSpeed],
            ['key' => 'drive_max_speed', 'value' => $request->propEditMaxSpeed],
            ['key' => 'drive_get_time', 'value' => $request->propEditGetTime],
            ['key' => 'drive_send_time', 'value' => $request->propEditSendTime],
            ['key' => 'drive_timeout', 'value' => $request->propEditTimeout],
            ['key' => 'watch_latitude', 'value' => $request->propEditLatitude],
            ['key' => 'watch_longitude', 'value' => $request->propEditLongitude],
            ['key' => 'watch_time', 'value' => $request->propEditWatchTime],
            ['key' => 'app_mode', 'value' => $request->propEditAppMode],
        ];
        if (Prop::upsert($data, ['key'], ['value'])) {
            return back()->with(['status' => 'Обновлено']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prop  $prop
     * @return \Illuminate\Http\Response
     */
    public function show(Prop $prop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prop  $prop
     * @return \Illuminate\Http\Response
     */
    public function edit(Prop $prop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropRequest  $request
     * @param  \App\Models\Prop  $prop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropRequest $request, Prop $prop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prop  $prop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prop $prop)
    {
        //
    }
}
