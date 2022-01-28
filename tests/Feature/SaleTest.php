<?php

use App\Models\User;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_sale_screen_can_be_rendered(){
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/sale');

        $response->assertOk();
    }

    public function test_sale_can_be_created(){

        $response = $this->post(route('sale.store'));

        $this->assertCount(1, Sale::all());

    }
}
