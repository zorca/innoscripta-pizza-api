<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testsProductsAreCreatedCorrectly()
    {
        $time = now()->toDateTimeString();
        $payload = [
            'name' => 'Test Pizza',
            'type' => 'pizza',
            'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
            'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
            'image' => 'https://pizza-api.zorca.org/default-images/default.jpg',
            'price' => 10.10,
            'created_at' => $time,
            'updated_at' => $time,
        ];

        $this->json('POST', '/api/products', $payload)
            ->assertStatus(201)
            ->assertJson([
                'id' => 10,
                'name' => 'Test Pizza',
                'type' => 'pizza',
                'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
                'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
                'image' => 'https://pizza-api.zorca.org/default-images/default.jpg',
                'price' => 10.10,
                'created_at' => $time,
                'updated_at' => $time,
            ]);
    }

    public function testsProductsAreUpdatedCorrectly()
    {
        $product = Product::create([
            'name' => 'Test Pizza',
            'type' => 'pizza',
            'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
            'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
            'price' => 10.10,
        ]);

        $payload = [
            'name' => 'Another Salad',
            'type' => 'salad',
        ];

        $response = $this->json('PUT', '/api/products/' . $product->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'id' => 10,
                'name' => 'Another Salad',
                'type' => 'salad',

                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }

    public function testsProductsAreDeletedCorrectly()
    {
        $product = Product::create([
            'name' => 'Test Pizza',
            'type' => 'pizza',
            'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
            'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
            'price' => 10.10,
        ]);

        $this->json('DELETE', '/api/products/' . $product->id, [])
            ->assertStatus(204);
    }

    public function testProductsAreListedCorrectly()
    {

        Product::create([
            'name' => 'Test Pizza',
            'type' => 'pizza',
            'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
            'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
            'price' => 10.10,
        ]);

        Product::create([
            'name' => 'Another Pizza',
            'type' => 'pizza',
            'description' => 'Another pizza description.',
            'properties' => 'Mozarella, Tomatoes',
            'price' => 18.25,
        ]);

        $response = $this->json('GET', '/api/products', [])
            ->assertStatus(200)
            ->assertJson([
                [
                    'name' => 'Pepperoni',
                    'type' => 'pizza',
                    'description' => 'Slices of crispy pepperoni & creamy mozzarella with fresh tomatoes.',
                    'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/pepperoni.jpg',
                    'price' => 10.40,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Margherita',
                    'type' => 'pizza',
                    'description' => 'Diced tomatoes & stretchy mozzarella, topped with oregano.',
                    'properties' => 'Mozarella, Tomatoes, Oregano',
                    'image' => 'https://pizza-api.zorca.org/default-images/margherita.jpg',
                    'price' => 8.60,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Texas',
                    'type' => 'pizza',
                    'description' => 'Legendary Texas pizza with bavarian sausages and mushrooms.',
                    'properties' => 'Corn, Onion, Mushrooms, Bavarian sausages, Mozarella, BBQ sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/texas.jpg',
                    'price' => 13.90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Cheeseburger',
                    'type' => 'pizza',
                    'description' => 'Cheeeeeeeeeeeesburger pizza with beef and burger sauce.',
                    'properties' => 'Double serving Pulled beef, Gravy (Burger sauce), Onion, Mozarella, BBQ sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/default.jpg',
                    'price' => 15.90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Americana',
                    'type' => 'pizza',
                    'description' => 'Americana pizza with bacon and pepperoni.',
                    'properties' => 'Bacon, Ham, Mozarella, Peperoni, Domino\'s sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/americana.jpg',
                    'price' => 13.65,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Vegetable',
                    'type' => 'pizza',
                    'description' => 'Special vegetable pizza for vegans.',
                    'properties' => 'Green pepper, Olives, Onion, Mushrooms, Mozarella, Tomatoes, Domino\'s sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/vegetable.jpg',
                    'price' => 13.65,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bavarian',
                    'type' => 'pizza',
                    'description' => 'Bavarian pizza with sausages and parmesan.',
                    'properties' => 'Parmesan, Bavarian sausages, Mozarella, BBQ sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/default.jpg',
                    'price' => 14.85,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Hawaiian',
                    'type' => 'pizza',
                    'description' => 'Hawaiian pizza with chicken and pineapple slices.',
                    'properties' => 'Chicken, Pineapple, Mozarella, Domino\'s sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/hawaiian.jpg',
                    'price' => 14.85,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Munich',
                    'type' => 'pizza',
                    'description' => 'Munich pizza with ham and mustard.',
                    'properties' => 'Ham, Mustard, Bavarian sausages, Mozarella, Tomatoes, White sausages, BBQ sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/bavarian.jpg',
                    'price' => 14.85,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Test Pizza',
                    'type' => 'pizza',
                    'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
                    'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
                    'image' => 'https://pizza-api.zorca.org/default-images/default.jpg',
                    'price' => 10.10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Another Pizza',
                    'type' => 'pizza',
                    'description' => 'Another pizza description.',
                    'properties' => 'Mozarella, Tomatoes',
                    'image' => 'https://pizza-api.zorca.org/default-images/default.jpg',
                    'price' => 18.25,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'type', 'description', 'properties', 'price', 'created_at', 'updated_at'],
            ]);
    }
}

