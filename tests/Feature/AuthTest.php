<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_and_login_and_access_protected_route()
    {
        // Register
        $registerData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $this->postJson('/api/register', $registerData)
             ->assertStatus(201)
             ->assertJsonStructure(['user', 'access_token']);

        // Login
        $loginResp = $this->postJson('/api/login', [
            'email' => 'testuser@example.com',
            'password' => 'password'
        ])->assertStatus(200)->json();

        $token = $loginResp['access_token'];

        // Access protected route
        $this->withHeader('Authorization', 'Bearer ' . $token)
             ->getJson('/api/pacientes')
             ->assertStatus(200);
    }
}
