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
        return view('_lvz.prop-index', ['prop' => $prop]);
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
            ['key' => 'show_org_name', 'value' => $request->propOrgName],
            ['key' => 'show_sub_name', 'value' => $request->propSubName],
            ['key' => 'show_sub_address_1', 'value' => $request->propSubAddress1],
            ['key' => 'show_sub_address_2', 'value' => $request->propSubAddress2],
            ['key' => 'show_id', 'value' => $request->propId],
            ['key' => 'show_nn', 'value' => $request->propNn],
            ['key' => 'show_version', 'value' => $request->propVersion],
            ['key' => 'show_assembly', 'value' => $request->propAssembly],
            ['key' => 'drive_min_speed', 'value' => $request->propMinSpeed],
            ['key' => 'drive_max_speed', 'value' => $request->propMaxSpeed],
            ['key' => 'drive_get_time', 'value' => $request->propGetTime],
            ['key' => 'drive_send_time', 'value' => $request->propSendTime],
            ['key' => 'drive_timeout', 'value' => $request->propTimeout],
            ['key' => 'drive_error', 'value' => $request->propError],
            ['key' => 'watch_latitude', 'value' => $request->propLatitude],
            ['key' => 'watch_longitude', 'value' => $request->propLongitude],
            ['key' => 'watch_time', 'value' => $request->propWatchTime],
            ['key' => 'app_mode', 'value' => $request->propAppMode],
            ['key' => 'app_register', 'value' => $request->propAppRegister],
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
