<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'=>'Sổ tay',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở viết',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Phụ kiện',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Art and Craft',
                'parent_id'=>0,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name'=>'Sổ kẻ ngang - Lined',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ chấm - Dotgrid',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ trơn - Plain',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ ô vuông - Grid',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ vẽ - Sketchbook',
                'parent_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Vở kẻ ngang - Lined',
                'parent_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở chấm - Dotgrid',
                'parent_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở ô vuông - Grid',
                'parent_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở siêu dày - Composition',
                'parent_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở Cornell - Cornell',
                'parent_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Bút',
                'parent_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sticker',
                'parent_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Washitape',
                'parent_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Giấy note',
                'parent_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Đất sét tự khô - Air Dry Clay',
                'parent_id'=>4,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Luyện chữ - Calligraphy',
                'parent_id'=>4,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Luyện chữ - Handwriting',
                'parent_id'=>4,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
