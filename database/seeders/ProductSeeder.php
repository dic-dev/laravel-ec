<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => '1',
            'maker' => 'シマダ',
            'name' => 'ロッド1',
            'price' => '20000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker' => 'シマダ',
            'name' => 'ロッド2',
            'price' => '22000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker' => 'タイワ',
            'name' => 'ロッド3',
            'price' => '18000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker' => 'タイワ',
            'name' => 'ロッド4',
            'price' => '25000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker' => 'かまかつ',
            'name' => 'ロッド5',
            'price' => '40000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker' => 'かまかつ',
            'name' => 'ロッド6',
            'price' => '50000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker' => 'シマダ',
            'name' => 'ルアー1',
            'price' => '1500',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker' => 'シマダ',
            'name' => 'ルアー2',
            'price' => '1800',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker' => 'タイワ',
            'name' => 'ルアー3',
            'price' => '2000',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker' => 'タイワ',
            'name' => 'ルアー4',
            'price' => '1300',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker' => 'かまかつ',
            'name' => 'ルアー5',
            'detail' => 'ルアーです。',
            'price' => '5000',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker' => 'かまかつ',
            'name' => 'ルアー6',
            'price' => '4000',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker' => 'シマダ',
            'name' => '釣具ケース1',
            'price' => '2000',
            'detail' => '釣具ケースです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker' => 'シマダ',
            'name' => 'プライヤー1',
            'price' => '1000',
            'detail' => 'プライヤーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker' => 'タイワ',
            'name' => '釣具ケース2',
            'price' => '3000',
            'detail' => '釣具ケースです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker' => 'タイワ',
            'name' => 'プライヤー2',
            'price' => '800',
            'detail' => 'プライヤーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker' => 'かまかつ',
            'name' => '釣具ケース3',
            'price' => '6000',
            'detail' => '釣具ケースです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker' => 'かまかつ',
            'name' => 'プライヤー3',
            'price' => '3000',
            'detail' => 'プライヤーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);

        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'category_id' => rand(1, 3),
                'maker' => 'シマダ',
                'name' => 'ロッド' . $i+6,
                'price' => rand(1000, 3000) * 10,
                'detail' => '釣り竿です。'
            ]);
        }
    }
}
