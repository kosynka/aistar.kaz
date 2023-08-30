<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        DB::table('users')->insert([
            [
                'fio' => 'Admin',
                'phone' => '87022363206',
                'password' => Hash::make('hc7ERM2IT4'),
                'city_id' => 1,
                'role_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'fio' => 'some temp user',
                'phone' => '87777777777',
                'password' => Hash::make('123'),
                'city_id' => 1,
                'role_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
