<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_image')->insert([
            [
                'product_id'=>1,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay scrapbook A5 dot 130gsm The Reverie Diary - Thỏ Nơ.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>6,
                'image_url'=>env('APP_URL') . '/thumbnails/Vở chấm dot 120 trang Crabit x SGT - The Furry Friends - Xanh tím.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
             [
                'product_id'=>18,
                'image_url'=>env('APP_URL') . '/thumbnails/Set Mini Post Card A Few Notes.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>19,
                'image_url'=>env('APP_URL') . '/thumbnails/Box làm đất sét tự khô - Be Happier Clay Craft Box - Box dành cho 1 người (500g).jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>5,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay A5 kẻ ngang 130gsm 110 trang A Few Notes - We Should Grab A Matcha.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>6,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay bỏ túi Dot The Furry Friends Crabit x SGT - Cu Lỳ.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>7,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ trơn khổ vuông Ribbon Collection Quote Trắng (Tặng kèm nơ).jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>8,
                'image_url'=>env('APP_URL') . '/thumbnails/Sổ tay scrapbook A5 grid 130gsm The Reverie Diary - Nhũ Sọc Xanh.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>9,
                'image_url'=>env('APP_URL') . '/thumbnails/Sketchbook Khổ Vuông 190gsm The Reverie Diary - Nhũ Nơ Hồng.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>10,
                'image_url'=>env('APP_URL') . '/thumbnails/Vở kẻ ngang chấm 80 trang B5 giấy Nhật Crabit x Kokuyo Land of Too-Shy 2 - Bananeet Picnic.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
            [
                'product_id'=>12,
                'image_url'=>env('APP_URL') . '/thumbnails/Vở grid caro 80gsm 100 trang The Reverie Diary - Nơ Hồng To.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>13,
                'image_url'=>env('APP_URL') . '/thumbnails/Vở kẻ ngang 500 trang tặng kèm sticker Composition Collection - Xanh Teal.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>14,
                'image_url'=>env('APP_URL') . '/thumbnails/Vở cornel grid 120 trang Composition Collection - Tím.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ], 
             [
              'product_id'=>15,
                'image_url'=>env('APP_URL') . '/thumbnails/Hộp 5 bút gel Kaco Pure - Morandi 2.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ], 
             [
              'product_id'=>16,
                'image_url'=>env('APP_URL') . '/thumbnails/Sticker Dính Vía Siêu to dán Vali.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
              'product_id'=>17,
                'image_url'=>env('APP_URL') . '/thumbnails/Masking Tape cuộn vintage.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
              'product_id'=>20,
                'image_url'=>env('APP_URL') . '/thumbnails/Combo 2 bút luyện viết chữ Calligraphy chuyên dụng.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
              'product_id'=>21,
                'image_url'=>env('APP_URL') . '/thumbnails/Bộ sách luyện viết Modern Calligraphy & Handwriting.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
        ]);
    }
}
