<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // The hasProducts() function means they must be a products() method in the User Model,
        // which define the relation btw users and products.
        User::factory()->count(3)->hasProducts(2)->hasOrders(2)->create();
    }
}
