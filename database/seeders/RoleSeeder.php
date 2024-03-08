<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
              'id' => 1,
              'role' => 'GUEST'
          ],
          [
              'id' => 2,
              'role' => 'USER'
          ],
          [
              'id' => 3,
              'role' => 'ADMIN'
          ]
        ];
        foreach ($data as $value) {
            Role::create($value);
        }
    }
}
