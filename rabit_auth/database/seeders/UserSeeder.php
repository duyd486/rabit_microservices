<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'duy',
                'email'=>'duy@gmail.com',
                'password'=>Hash::make('11111111'),
                'avatar_url' => env('APP_URL') . '/avatars/defaultAvt.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'trang',
                'email'=>'trang@gmail.com',
                'password'=>Hash::make('11111111'),
                'avatar_url' => env('APP_URL') . '/avatars/defaultAvt.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'hieu',
                'email'=>'hieu@gmail.com',
                'password'=>Hash::make('11111111'),
                'avatar_url' => env('APP_URL') . '/avatars/defaultAvt.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'ngoc',
                'email'=>'ngoc@gmail.com',
                'password'=>Hash::make('11111111'),
                'avatar_url' => env('APP_URL') . '/avatars/defaultAvt.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
