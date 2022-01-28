<?php

use App\Models\User;
use Tests\TestCase;

class ErrorViewTest extends TestCase
{
    public function test_errorView_can_be_rended(){
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $user=auth()->user();
        $data=(['error'=>'error']);
        $user->update($data);

        $response = $this->get('/error');

        $response->assertOk();
    }
}
