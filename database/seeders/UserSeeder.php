<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Ramsey\Uuid\Type\Time;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'ADMIN',
            'email' => 'er9p21873@gmail.com',
            'email_verified_at' => Carbon::now()->timestamp,
            'password' => \Hash::make('12345678'),
        ];
        if ($user = User::create($data)) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 1
            ]);
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 2
            ]);
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 3
            ]);
        }
    }
}
