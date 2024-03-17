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
        if ($request->user()->cannot('create', Prop::class)) {
            return back()->withErrors([
                'status' => 'Вы не можете выполнить данное действие!'
            ])->withInput();
        }
        $data = [
            ['key' => 'org_name', 'value' => $request->propEditOrgName],
            ['key' => 'sub_name', 'value' => $request->propEditSubName],
            ['key' => 'sub_address_1', 'value' => $request->propEditSubAddress1],
            ['key' => 'sub_address_2', 'value' => $request->propEditSubAddress2],
            ['key' => 'id', 'value' => $request->propEditId],
            ['key' => 'pn', 'value' => $request->propEditPn],
            ['key' => 'version', 'value' => $request->propEditVersion],
            ['key' => 'assembly', 'value' => $request->propEditAssembly],
        ];
        if (Prop::upsert($data, ['key'], ['value'])) {
            return back()->with(['status' => 'Обновлено']);
        } else {
            return back()->withErrors([
                'status' => 'Ошибка внесения данных в БД'
            ]);
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
