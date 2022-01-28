<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{

    public function test_product_can_be_created()
    {
        $response = $this->post('/product', [
            'name' => 'Test User',
            'value' => '15',
            'stock' => '100'
        ]);

        $this->assertDatabaseHas('products',
            [
                'name' => 'Test User'
            ]);

        $response->assertOk();
    }

    public function test_products_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response=$this->get('/product');

        $response->assertStatus(200);
    }

    public function test_product_can_be_updated()
    {
        $product= Product::factory()->create();

        $response=$this->post('/product',[
            $product,

        ]);

        $response=$this->get('/product');

        $response->assertStatus(200);
    }

    public function test_creation_products_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response=$this->get('/product/create');

        $response->assertStatus(200);
    }
}
