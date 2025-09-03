<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ad;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(20)->create();
        $this->call([
            AdsSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'login' => 'TestUser',
        //     'email' => 'test@example.com',
        // ]);
      
        $categories = Category::factory(10)->create(); 
        Ad::factory(20)->create([                  
            'category_id' => fn() => $categories->random()->id,
        ]);
    }
}
