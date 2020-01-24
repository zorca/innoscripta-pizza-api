<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testsProductsAreCreatedCorrectly()
    {
        $payload = [
            'name' => 'Test Pizza',
            'type' => 'pizza',
            'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
            'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
            'price' => 10.10,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        $this->json('POST', '/api/products', $payload)
            ->assertStatus(201)
            ->assertJson([
                'id' => 4,
                'name' => 'Test Pizza',
                'type' => 'pizza',
                'description' => 'Slices of tasty pepperoni & creamy mozzarella.',
                'properties' => 'Mozarella, Pepperoni, Tomatoes, BBQ sauce',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ]);
    }
}

