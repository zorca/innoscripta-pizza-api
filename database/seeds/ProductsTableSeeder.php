<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert(
            [
                [
                    'name' => 'Pepperoni',
                    'type' => 'pizza',
                    'description' => 'Slices of crispy pepperoni & creamy mozzarella with fresh tomatoes.',
                    'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
                    'price' => 10.40,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Margherita',
                    'type' => 'pizza',
                    'description' => 'Diced tomatoes & stretchy mozzarella, topped with oregano.',
                    'properties' => 'Mozarella, Tomatoes, Oregano',
                    'price' => 8.60,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Texas',
                    'type' => 'pizza',
                    'description' => 'Legendary Texas pizza with bavarian sausages and mushrooms.',
                    'properties' => 'Corn, Onion, Mushrooms, Bavarian sausages, Mozarella, BBQ sauce',
                    'price' => 13.90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
