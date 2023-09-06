<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Дрели',
                'parent_id' => 0,
            ],
            [
                'name' => 'Откосы',
                'parent_id' => 0,
            ],
            [
                'name' => 'Полы',
                'parent_id' => 0,
            ],
            
        ];

        DB::table('categories')->insert($data);
    }
}
