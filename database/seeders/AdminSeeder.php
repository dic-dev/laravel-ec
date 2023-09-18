<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 追加 DBファサードを使用
use Illuminate\Support\Facades\Hash; // 追加 Hashファサードを使用

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([ // usersテーブルに初期データを登録
            'name' => 'root',
            'email' => 'root@test.com',
            'password' => Hash::make('11111111'), // Hashファサードで暗号化
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}

