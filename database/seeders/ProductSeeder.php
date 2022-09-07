<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Product::factory()->count(3)->has(User::factory()->count(2), 'users')->create();

        // Using the magic method to create data in the model and related model
        Product::factory()->count(5)->hasUsers(2)->create();
    }
}
