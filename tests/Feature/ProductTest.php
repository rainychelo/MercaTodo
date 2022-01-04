<?php

use App\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_can_be_created()
    {
        $response = $this->post('/product', [
            'name' => 'Test User',
            'value' => '15'
        ]);

        $this->assertDatabaseHas('products', ['name' => 'Test User',
            'value' => '15']);

        $response->assertOk();
    }
}
