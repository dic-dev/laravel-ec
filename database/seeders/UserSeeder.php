<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 追加 DBファサードを使用
use Illuminate\Support\Facades\Hash; // 追加 Hashファサードを使用

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([ // usersテーブルに初期データを登録
            'name' => '田中 太郎',
            'email' => 'user1@test.com',
            'password' => Hash::make('11111111'), // Hashファサードで暗号化
            'postal_code' => '2222222',
            'pref_id' => '3',
            'city' => '田中市',
            'address1' => '太郎町1-3',
            'address2' => 'おんぼろマンション101',
            'tel' => '44444444444',
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}
