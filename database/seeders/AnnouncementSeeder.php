<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            [
                'title' => 'Announcement 1',
                'description' => 'Description for announcement 1.',
                'start_at' => now(),
                'end_at' => now()->addDays(7),
                'category_id' => 1,
            ],
            [
                'title' => 'Announcement 2',
                'description' => 'Description for announcement 2.',
                'start_at' => now(),
                'end_at' => now()->addDays(14),
                'category_id' => 2,
            ],
        ];

        DB::table('announcements')->insert($data);
    }
}
