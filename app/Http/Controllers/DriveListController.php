<?php

namespace App\Http\Controllers;

use App\Models\DriveList;
use App\Http\Requests\StoreDriveListRequest;
use App\Http\Requests\UpdateDriveListRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DriveListController extends Controller
{
    public function terminal (Request $request) {
        if (DriveList::create($request->all())) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDriveListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriveListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriveList  $driveList
     * @return \Illuminate\Http\Response
     */
    public function show(DriveList $driveList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriveList  $driveList
     * @return \Illuminate\Http\Response
     */
    public function edit(DriveList $driveList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriveListRequest  $request
     * @param  \App\Models\DriveList  $driveList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriveListRequest $request, DriveList $driveList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriveList  $driveList
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriveList $driveList)
    {
        //
    }
}
