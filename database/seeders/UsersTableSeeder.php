<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Si usas la tabla users por defecto
        DB::table('users')->updateOrInsert(
            ['email' => 'demo@vip2cars.local'],
            [
                'name' => 'Demo User',
                'email' => 'demo@vip2cars.local',
                'password' => Hash::make('demo1234'), // contraseña demo: demo1234
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
