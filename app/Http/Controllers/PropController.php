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
    public function index()
    {
        return view('_lvz.prop-index', ['prop' => $this->prop]);
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
            ['key' => 'show_org_name', 'value' => $request->propShowOrgName],
            ['key' => 'show_sub_name', 'value' => $request->propShowSubName],
            ['key' => 'show_sub_address_1', 'value' => $request->propShowSubAddress1],
            ['key' => 'show_sub_address_2', 'value' => $request->propShowSubAddress2],
            ['key' => 'show_id', 'value' => $request->propShowId],
            ['key' => 'show_nn', 'value' => $request->propShowNn],
            ['key' => 'show_version', 'value' => $request->propShowVersion],
            ['key' => 'show_assembly', 'value' => $request->propShowAssembly],
            ['key' => 'drive_min_speed', 'value' => $request->propDriveMinSpeed],
            ['key' => 'drive_max_speed', 'value' => $request->propDriveMaxSpeed],
            ['key' => 'drive_get_time', 'value' => $request->propDriveGetTime],
            ['key' => 'drive_send_time', 'value' => $request->propDriveSendTime],
            ['key' => 'drive_timeout', 'value' => $request->propDriveTimeout],
            ['key' => 'drive_error', 'value' => $request->propDriveError],
            ['key' => 'watch_latitude', 'value' => $request->propWatchLatitude],
            ['key' => 'watch_longitude', 'value' => $request->propWatchLongitude],
            ['key' => 'watch_time', 'value' => $request->propWatchTime],
            ['key' => 'app_mode', 'value' => $request->propAppMode],
            ['key' => 'app_register', 'value' => $request->propAppRegister],
            ['key' => 'app_paginator', 'value' => $request->propAppPaginator],
            ['key' => 'sms_chance', 'value' => $request->propSmsChance],
            ['key' => 'sms_name', 'value' => $request->propSmsName],
            ['key' => 'sms_subject', 'value' => $request->propSmsSubject],
            ['key' => 'sms_line_1', 'value' => $request->propSmsLine1],
            ['key' => 'sms_line_2', 'value' => $request->propSmsLine2],
            ['key' => 'sms_line_3', 'value' => $request->propSmsLine3],
            ['key' => 'sms_line_random', 'value' => $request->propSmsRandom],
            ['key' => 'sms_line_separator', 'value' => $request->propSmsSeparator],
            ['key' => 'sms_end', 'value' => $request->propSmsEnd],
        ];
        if ($this->prop->upsert($data, ['key'], ['value'])) {
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
