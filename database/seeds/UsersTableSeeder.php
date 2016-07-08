<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventory\User::class, 1)->create();
        factory(Inventory\Category::class, 1)->create();
        factory(Inventory\Product::class, 5)->create();
    }
}
