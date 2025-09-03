<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            'fashion' => [
                'shoes',
                'clocks',
                'clothes',
            ],

            'entertainment' => [
                'books',
                'movies',
                'music',
                'games'
            ],

            'accessories' => [],

            'electronics' => [
                'computers',
            ],


        ];

        $products = [
            // 'electronics' => [
                'air purifier',
                'blenders',
                'digital camera',
                'curling iron',
                'electric frying pan',
                'dvd player',
                'pc gamer',
                'iphone 13',
                'iphone 15',
                'xiaomi',
                'ipad',
                'motorolla 900',
                'electric razor',
                'ipod',
                'iron'
            // ]
        ];

        // creer les categories
        foreach ($categories as $key => $item) {
            $parent = \App\Models\Category::create(['name' => $key]);
            foreach ($item as $subCategory) {
                \App\Models\Category::create(['name' => $subCategory, 'parent_id' => $parent->id]);
            }
        }
        // creer les produits
        foreach ($products as $item) {
            \App\Models\Ad::create([
                'title' => $item,
                'category_id' => 11,
                'description' => 'A quality product with a best design at uncredible price',
                'price' => random_int(1000, 10000),
                'location' => random_int(65686, 69965),
                'condition' => 'good',
                'slug' => Str::slug($item),
                'created_by' => 1,
                'user_id' => 1,
            ]);
        }
    }
}
