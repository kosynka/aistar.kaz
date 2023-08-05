<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Астана',
                'region' => 'Астана',
            ],
            [
                'name' => 'Алматы',
                'region' => 'Алматы',
            ],
            [
                'name' => 'Шымкент',
                'region' => 'Шымкент',
            ],
            [
                'name' => 'Караганда',
                'region' => 'Карагандинская область',
            ],
            [
                'name' => 'Актобе',
                'region' => 'Актюбинская область',
            ],
        ];

        DB::table('cities')->insert($data);
    }
}
