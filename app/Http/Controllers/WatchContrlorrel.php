<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchContrlorrel extends Controller
{
    public function index()
    {
        return view('_lvz.watch-index', ['prop' => $this->prop]);
    }
}
