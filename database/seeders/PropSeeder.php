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
            ['key' => 'org_name', 'value' => 'ТОВ "LVZ"'],
            ['key' => 'sub_name', 'value' => 'Мотор-депо ТЧМ-1'],
            ['key' => 'sub_address_1', 'value' => 'Україна, Волинська обл., м. Луцьк,'],
            ['key' => 'sub_address_2', 'value' => 'пр. Волі, буд. 22'],
            ['key' => 'id', 'value' => '40720198'],
            ['key' => 'pn', 'value' => '407201926538'],
            ['key' => 'version', 'value' => '1/001'],
            ['key' => 'assembly', 'value' => '170324'],
        ];
        Prop::upsert($data, ['key'], ['value']);
    }
}
