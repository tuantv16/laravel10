<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->name,
                'category_id' => $faker->numberBetween(1, 5), // Thay 5 bằng số lượng danh mục tương ứng của bạn
                'amount' => $faker->randomFloat(2, 10, 1000), // Giá tiền ngẫu nhiên từ 10 đến 1000 với 2 số thập phân
                'description' => $faker->text,
            ]);
        }
    }
}
