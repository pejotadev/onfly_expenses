<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    private $token;
    /**
     *  Create user test.
     */
    public function test_create_user(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Teste',
            'email' => 'emailteste@email.com',
            'password' => '123456'
        ]);

        $response->assertStatus(201);

    }

    /**
     *  Get auth.
     */
    public function test_get_auth(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'emailteste@email.com',
            'password' => '123456'
        ]);

        $response->assertStatus(200);

        $response = json_decode($response->getContent());

        $this->token = $response->token;

    }

    /**
     *  Get user test.
     */
    public function test_get_user(): void
    {
        $this->test_get_auth();

        $response = $this->getJson('/api/user', [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(200);

    }

    /**
     *  Delete user test.
     */
    public function test_delete_user(): void
    {
        $this->test_get_auth();

        $response = $this->deleteJson('/api/user', [], [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(204);

    }
}
