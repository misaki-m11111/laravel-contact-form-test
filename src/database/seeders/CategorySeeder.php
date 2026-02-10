<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            '1.商品のお届けについて',
            '2.商品の交換について',
            '3.商品トラブル',
            '4.ショップへのお問い合わせ',
            '5.その他',
        ];

        foreach ($categories as $category) {
            Category::create([
                'content' => $category,
            ]);
        }
    }
}
