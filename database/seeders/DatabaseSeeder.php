<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ad;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::factory(50)->create(); 

        Ad::factory(150)->create([                  
            'category_id' => fn() => $categories->random()->id,
        ]);
    }
}
