<?php

use App\Models\User;
use Tests\TestCase;

class ShoppingCarTest extends TestCase
{
    public function test_ShoppingCar_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/shoppingCar');

        $response->assertOk();
    }


}
