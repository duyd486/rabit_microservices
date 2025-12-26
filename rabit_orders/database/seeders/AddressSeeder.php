<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('addresses')->truncate();

        DB::table('addresses')->insert([
            [
                'user_id' => 1,
                'addresses' => '123 Lê Lợi, Phường Bến Thành, Quận 1, TP.HCM',
                'phone' => '0909123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'addresses' => '456 Nguyễn Trãi, Quận 5, TP.HCM',
                'phone' => '0912345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'addresses' => '789 Trần Hưng Đạo, Quận 1, TP.HCM',
                'phone' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
