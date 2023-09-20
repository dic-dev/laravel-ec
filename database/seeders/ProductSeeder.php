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
            'category_id' => '2',
            'maker_id' => '2',
            'name' => 'ロッド1',
            'price' => '20000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker_id' => '2',
            'name' => 'ロッド2',
            'price' => '22000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker_id' => '3',
            'name' => 'ロッド3',
            'price' => '18000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker_id' => '3',
            'name' => 'ロッド4',
            'price' => '25000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker_id' => '4',
            'name' => 'ロッド5',
            'price' => '40000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '2',
            'maker_id' => '4',
            'name' => 'ロッド6',
            'price' => '50000',
            'detail' => '釣り竿です。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker_id' => '2',
            'name' => 'ルアー1',
            'price' => '1500',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker_id' => '2',
            'name' => 'ルアー2',
            'price' => '1800',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker_id' => '3',
            'name' => 'ルアー3',
            'price' => '2000',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker_id' => '3',
            'name' => 'ルアー4',
            'price' => '1300',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker_id' => '4',
            'name' => 'ルアー5',
            'detail' => 'ルアーです。',
            'price' => '5000',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '3',
            'maker_id' => '4',
            'name' => 'ルアー6',
            'price' => '4000',
            'detail' => 'ルアーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker_id' => '2',
            'name' => '釣具ケース1',
            'price' => '2000',
            'detail' => '釣具ケースです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker_id' => '2',
            'name' => 'プライヤー1',
            'price' => '1000',
            'detail' => 'プライヤーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker_id' => '3',
            'name' => '釣具ケース2',
            'price' => '3000',
            'detail' => '釣具ケースです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker_id' => '3',
            'name' => 'プライヤー2',
            'price' => '800',
            'detail' => 'プライヤーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker_id' => '4',
            'name' => '釣具ケース3',
            'price' => '6000',
            'detail' => '釣具ケースです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);
        Product::create([
            'category_id' => '1',
            'maker_id' => '4',
            'name' => 'プライヤー3',
            'price' => '3000',
            'detail' => 'プライヤーです。',
            'created_at' => '2023/01/01 11:11:11'
        ]);

        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'category_id' => rand(1, 3),
                'maker_id' => rand(1,4),
                'name' => '商品' . $i,
                'price' => rand(1000, 3000) * 10,
                'detail' => '釣り用品です。'
            ]);
        }
    }
}
