<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->insert([
            [
                'user_id'=>1,
                'language'=>'VI',
                'color'=>'#FFFFFF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'=>2,
                'language'=>'VI',
                'color'=>'#FFFFFF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'=>3,
                'language'=>'VI',
                'color'=>'#FFFFFF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'=>4,
                'language'=>'VI',
                'color'=>'#FFFFFF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
