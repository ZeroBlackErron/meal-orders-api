<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithFaker;

    public function test_successful_login()
    {
        $user = User::factory()->createOne();

        $loginData = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->postJson('/api/login', $loginData);

        $response->assertOk()
            ->assertJsonStructure(['user' => ['id', 'name', 'last_name', 'email'], 'token']);
    }

    public function test_login_with_wrong_email()
    {
        $loginData = [
            'email' => $this->faker->email(),
            'password' => 'password',
        ];

        $response = $this->postJson('/api/login', $loginData);

        $response->assertUnprocessable()
            ->assertJsonStructure(['message', 'errors'])
            ->assertJsonValidationErrors(['email']);
    }

    public function test_login_with_wrong_password()
    {
        $user = User::factory()->createOne();

        $loginData = [
            'email' => $user->email,
            'password' => $this->faker->password(8),
        ];

        $response = $this->postJson('/api/login', $loginData);

        $response->assertStatus(400)
            ->assertJsonStructure(['message']);
    }
}
