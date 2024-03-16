<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropController extends Controller
{
    public function get ($key) {
        $list = [
            'org_name' => 'ТОВ "LVZ"',
            'sub_name' => 'LVZ-мотопарк',
            'sub_address' => 'Україна, Волинська обл., м. Луцьк, пр. Волі, 22',
            'id' => '40720198',
            'pn' => '407201926538',
            'version' => '0.001a',
            'assembly' => '94984348453'
        ];
        return $list[$key];
    }
}
