<?php

use Tests\TestCase;

class ShoppingCarItemsTest extends TestCase
{
    public function test_shoppingCarItem_can_be_created(){
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
    }
}
