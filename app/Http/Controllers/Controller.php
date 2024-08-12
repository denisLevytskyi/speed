<?php

namespace App\Http\Controllers;

use App\Models\Prop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct (public Prop $prop) {}

    public function haveChild(Model $model, $key, $value): bool {
        if (Auth::user()->isAdministrator()) {
            return FALSE;
        }
        if ($model->where($key, '=', $value)->exists()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
