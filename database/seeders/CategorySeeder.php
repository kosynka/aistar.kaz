<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Category 1',
                'parent_id' => null,
                'level' => 1,
            ],
            [
                'name' => 'Category 2',
                'parent_id' => 1,
                'level' => 2,
            ],
            [
                'name' => 'Category 3',
                'parent_id' => 2,
                'level' => 3,
            ],
            
        ];

        DB::table('categories')->insert($data);
    }
}
