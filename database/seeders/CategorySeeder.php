<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'ロッド',
            'created_at' => '2024/01/01 11:11:11'
        ]);
        Category::create([
            'name' => 'ルアー',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Category::create([
            'name' => 'その他',
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}
