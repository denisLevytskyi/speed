<?php

namespace Database\Seeders;

use App\Models\Prop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['key' => 'show_org_name', 'value' => 'НФО "LVZ"'],
            ['key' => 'show_sub_name', 'value' => '__________'],
            ['key' => 'show_sub_address_1', 'value' => '__________'],
            ['key' => 'show_sub_address_2', 'value' => '__________'],
            ['key' => 'show_id', 'value' => '__________'],
            ['key' => 'show_nn', 'value' => '__________'],
            ['key' => 'show_version', 'value' => '__________'],
            ['key' => 'show_assembly', 'value' => '__________'],
            ['key' => 'drive_min_speed', 'value' => '0'],
            ['key' => 'drive_max_speed', 'value' => '100'],
            ['key' => 'drive_get_time', 'value' => '6000'],
            ['key' => 'drive_send_time', 'value' => '4000'],
            ['key' => 'drive_timeout', 'value' => '10000'],
            ['key' => 'drive_error', 'value' => '3'],
            ['key' => 'watch_latitude', 'value' => '50.757585195824504'],
            ['key' => 'watch_longitude', 'value' => '25.349317509680986'],
            ['key' => 'watch_time', 'value' => '5000'],
            ['key' => 'app_mode', 'value' => '0'],
            ['key' => 'app_register', 'value' => '0'],
        ];
        Prop::upsert($data, ['key'], ['value']);
    }
}
