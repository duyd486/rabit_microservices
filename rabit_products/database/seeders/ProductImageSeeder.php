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
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sổ tay scrapbook A5 dot 130gsm The Reverie Diary - Thỏ Nơ.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>2,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Vở chấm dot 120 trang Crabit x SGT - The Furry Friends - Xanh tím.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
             [
                'product_id'=>3,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Set Mini Post Card A Few Notes.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>4,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Box làm đất sét tự khô - Be Happier Clay Craft Box - Box dành cho 1 người (500g).jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>5,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sổ tay A5 kẻ ngang 130gsm 110 trang A Few Notes - We Should Grab A Matcha.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>6,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sổ tay bỏ túi Dot The Furry Friends Crabit x SGT - Cu Lỳ.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>7,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sổ trơn khổ vuông Ribbon Collection Quote Trắng (Tặng kèm nơ).jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>8,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sổ tay scrapbook A5 grid 130gsm The Reverie Diary - Nhũ Sọc Xanh.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>9,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sketchbook Khổ Vuông 190gsm The Reverie Diary - Nhũ Nơ Hồng.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>10,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Vở kẻ ngang chấm 80 trang B5 giấy Nhật Crabit x Kokuyo Land of Too-Shy 2 - Bananeet Picnic.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
            [
                'product_id'=>11,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Vở grid caro 80gsm 100 trang The Reverie Diary - Nơ Hồng To.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>12,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Vở kẻ ngang 500 trang tặng kèm sticker Composition Collection - Xanh Teal.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
                'product_id'=>13,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Vở cornel grid 120 trang Composition Collection - Tím.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ], 
             [
              'product_id'=>14,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Hộp 5 bút gel Kaco Pure - Morandi 2.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ], 
             [
              'product_id'=>15,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Sticker Dính Vía Siêu to dán Vali.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
              'product_id'=>16,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Masking Tape cuộn vintage.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
              'product_id'=>17,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Combo 2 bút luyện viết chữ Calligraphy chuyên dụng.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
             [
              'product_id'=>18,
                'image_url'=>'http://127.0.0.1:8000/thumbnails/Bộ sách luyện viết Modern Calligraphy & Handwriting.jpg',
                'created_at'=>now(),
                'updated_at'=>now(),
             ],
        ]);
        $gatewayPublicPath = public_path('galleries');
      $folders = glob($gatewayPublicPath . "/product_*");

         foreach ($folders as $folderPath) {
        $folderName = basename($folderPath); 
        $productId = (int) str_replace("product_", "", $folderName);

        $images = glob($folderPath . "/*.{jpg,png,jpeg,webp,JPG,PNG}", GLOB_BRACE);
        foreach ($images as $img) {
            $fileName = basename($img);
            $relativePath = "galleries/" . $folderName . "/" . $fileName;

            $exists = DB::table('product_image')
                ->where('product_id', $productId)
                ->where('image_url', $relativePath)
                ->exists();

            if (!$exists) {
                DB::table('product_image')->insert([
                    'product_id' => $productId,
                    'image_url'  => $relativePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
         }
      }
   }
}