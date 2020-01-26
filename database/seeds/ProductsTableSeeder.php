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
                ],
                [
                    'name' => 'Cheeseburger',
                    'type' => 'pizza',
                    'description' => 'Cheeeeeeeeeeeesburger pizza with beef and burger sauce.',
                    'properties' => 'Double serving Pulled beef, Gravy (Burger sauce), Onion, Mozarella, BBQ sauce',
                    'price' => 15.90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Americana',
                    'type' => 'pizza',
                    'description' => 'Americana pizza with bacon and pepperoni.',
                    'properties' => 'Bacon, Ham, Mozarella, Peperoni, Domino\'s sauce',
                    'price' => 13.65,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Vegetable',
                    'type' => 'pizza',
                    'description' => 'Special vegetable pizza for vegans.',
                    'properties' => 'Green pepper, Olives, Onion, Mushrooms, Mozarella, Tomatoes, Domino\'s sauce',
                    'price' => 13.65,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bavarian',
                    'type' => 'pizza',
                    'description' => 'Bavarian pizza with sausages and parmesan.',
                    'properties' => 'Parmesan, Bavarian sausages, Mozarella, BBQ sauce',
                    'price' => 14.85,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Havaiian',
                    'type' => 'pizza',
                    'description' => 'Havaiian pizza with chicken and pineapple slices.',
                    'properties' => 'Chicken, Pineapple, Mozarella, Domino\'s sauce',
                    'price' => 14.85,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Munich',
                    'type' => 'pizza',
                    'description' => 'Munich pizza with ham and mustard.',
                    'properties' => 'Ham, Mustard, Bavarian sausages, Mozarella, Tomatoes, White sausages, BBQ sauce',
                    'price' => 14.85,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
