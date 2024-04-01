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
            ['key' => 'show_org_name', 'value' => 'ТОВ "LVZ"'],
            ['key' => 'show_sub_name', 'value' => 'Мотор-депо ТЧМ-1'],
            ['key' => 'show_sub_address_1', 'value' => 'Україна, Волинська обл., м. Луцьк,'],
            ['key' => 'show_sub_address_2', 'value' => 'пр. Волі, буд. 22'],
            ['key' => 'show_id', 'value' => '40720198'],
            ['key' => 'show_pn', 'value' => '407201926538'],
            ['key' => 'show_version', 'value' => '1/001'],
            ['key' => 'show_assembly', 'value' => '170324'],
            ['key' => 'drive_speed', 'value' => '100'],
            ['key' => 'drive_get_time', 'value' => '6000'],
            ['key' => 'drive_send_time', 'value' => '4000'],
            ['key' => 'drive_timeout', 'value' => '10000'],
            ['key' => 'drive_error', 'value' => '3'],
        ];
        Prop::upsert($data, ['key'], ['value']);
    }
}
