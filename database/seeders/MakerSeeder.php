<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maker;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Maker::create([
            'name' => 'その他',
            'created_at' => '2024/01/01 11:11:11'
        ]);
        Maker::create([
            'name' => 'シマダ',
            'created_at' => '2024/01/01 11:11:11'
        ]);
        Maker::create([
            'name' => 'タイワ',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Maker::create([
            'name' => 'かまかつ',
            'created_at' => '2023/01/01 11:11:11'
        ]);
    }
}
