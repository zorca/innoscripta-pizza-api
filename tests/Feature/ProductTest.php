<?php

namespace Tests\Feature;

use App\Models\Product;
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
}

