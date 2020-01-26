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
            'price' => 10.10,
            'created_at' => $time,
            'updated_at' => $time,
        ];

        $this->json('POST', '/api/products', $payload)
            ->assertStatus(201)
            ->assertJson([
                'id' => 4,
                'name' => 'Test Pizza',
                'type' => 'pizza',
                'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
                'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
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
                'id' => 4,
                'name' => 'Another Salad',
                'type' => 'salad',
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
                    'price' => 10.40,
                ],
                [
                    'name' => 'Margherita',
                    'type' => 'pizza',
                    'description' => 'Diced tomatoes & stretchy mozzarella, topped with oregano.',
                    'properties' => 'Mozarella, Tomatoes, Oregano',
                    'price' => 8.60,
                ],
                [
                    'name' => 'Texas',
                    'type' => 'pizza',
                    'description' => 'Legendary Texas pizza with bavarian sausages and mushrooms.',
                    'properties' => 'Corn, Onion, Mushrooms, Bavarian sausages, Mozarella, BBQ sauce',
                    'price' => 13.90,
                ],
                [
                    'name' => 'Test Pizza',
                    'type' => 'pizza',
                    'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
                    'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
                    'price' => 10.10,
                ],
                [
                    'name' => 'Another Pizza',
                    'type' => 'pizza',
                    'description' => 'Another pizza description.',
                    'properties' => 'Mozarella, Tomatoes',
                    'price' => 18.25,
                ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'type', 'description', 'properties', 'price', 'created_at', 'updated_at'],
            ]);
    }
}

