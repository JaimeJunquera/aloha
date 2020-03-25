<?php

use App\User;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Jaime Junquera',
            'email' => 'jjunquera@fairhall.es',
            'password' => '12345678',
        ]);
    }
}
