<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@123.com',
            'password' => '$2y$10$9mKO9Qd2RzPmIyZ6z.Nvg.zuwBaxVpZeqpEh/RqvlEcCeXlfJ635q',
            'current_team_id' => 1,
        ]);


    }
}
