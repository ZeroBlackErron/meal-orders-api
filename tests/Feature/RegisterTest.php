<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    private $endpoint = '/api/register';

    public function test_register_successful()
    {
        $user = User::factory()->makeOne();
        $user->makeVisible('password');

        $response = $this->postJson($this->endpoint, $user->toArray());

        $response->assertCreated()
            ->assertJsonStructure(['user' => ['id', 'name', 'last_name', 'email'], 'token']);
    }

    public function test_validations_on_register()
    {
        $response = $this->postJson($this->endpoint, []);

        $response->assertUnprocessable()
            ->assertJsonStructure(['message', 'errors'])
            ->assertJsonValidationErrors(['name', 'last_name', 'email', 'password']);
    }
}
