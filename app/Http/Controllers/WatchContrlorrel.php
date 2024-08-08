<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use App\Models\Prop;
use Illuminate\Http\Request;

class WatchContrlorrel extends Controller
{
    public function index(Prop $prop)
    {
        return view('_lvz.watch-index', ['prop' => $prop]);
    }
}
