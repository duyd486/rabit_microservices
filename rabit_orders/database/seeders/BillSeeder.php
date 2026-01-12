<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bill')->insert([
            [
                'user_id'=>2,
                'address_id'=>3,
                'status'=>'Shipping',
                'total_price'=>50000,
                'order_code'=>random_int(1,10),
                'create_at'=>now(),
                'updated_at'=>now()
            ]
        ]);
    }
}
