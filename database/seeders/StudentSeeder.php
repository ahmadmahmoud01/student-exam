<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            ['code' => 'A123', 'mark' => 85],
            ['code' => 'B456', 'mark' => 90],
            ['code' => 'C789', 'mark' => 75],
        ]);
    }
}
