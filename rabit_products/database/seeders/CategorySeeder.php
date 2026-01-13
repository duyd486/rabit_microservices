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
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sổ tay.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở viết',
                'parent_id'=>0,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Vở viết.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Phụ kiện',
                'parent_id'=>0,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Phụ kiện.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Art and Craft',
                'parent_id'=>0,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Art and Craft.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name'=>'Sổ kẻ ngang - Lined',
                'parent_id'=>1,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sổ kẻ ngang - Lined.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ chấm - Dotgrid',
                'parent_id'=>1,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sổ chấm - Dotgrid.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ trơn - Plain',
                'parent_id'=>1,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sổ trơn - Plain.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ ô vuông - Grid',
                'parent_id'=>1,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sổ ô vuông - Grid.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sổ vẽ - Sketchbook',
                'parent_id'=>1,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sổ vẽ - Sketchbook.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Vở kẻ ngang - Lined',
                'parent_id'=>2,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Vở kẻ ngang - Lined.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở chấm - Dotgrid',
                'parent_id'=>2,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Vở chấm - Dotgrid.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở ô vuông - Grid',
                'parent_id'=>2,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Vở ô vuông - Grid.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở siêu dày - Composition',
                'parent_id'=>2,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Vở siêu dày - Composition.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vở Cornell - Cornell',
                'parent_id'=>2,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Vở Cornell - Cornell.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Bút',
                'parent_id'=>3,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Bút.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sticker',
                'parent_id'=>3,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Sticker.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Washitape',
                'parent_id'=>3,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Washitape.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Giấy note',
                'parent_id'=>3,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Giấy note.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Đất sét tự khô - Air Dry Clay',
                'parent_id'=>4,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Đất sét tự khô - Air Dry Clay.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Luyện chữ - Calligraphy',
                'parent_id'=>4,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Luyện chữ - Calligraphy.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Luyện chữ - Handwriting',
                'parent_id'=>4,
                'thumbnail_url'=>'http://127.0.0.1:8000/category_backgrounds/Luyện chữ - Handwriting.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
