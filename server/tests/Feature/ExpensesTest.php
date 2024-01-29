<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpensesTest extends TestCase
{
    private $token;
    private $email = 'emailteste@email.com';
    private $password = '123456';

    /**
     *  Create user test.
     */
    public function test_create_user(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Teste',
            'email' => $this->email,
            'password' => $this->password
        ]);

        $response->assertStatus(201);
    }

    /**
     *  Get auth.
     */
    public function test_get_auth(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => $this->email,
            'password' => $this->password
        ]);

        $response->assertStatus(200);

        $response = json_decode($response->getContent());

        $this->token = $response->token;
    }

    /**
     *  Create expense test.
     */
    public function test_create_expense(): void
    {
        $this->test_get_auth();

        $response = $this->postJson('/api/expenses', [
            'description' => 'Teste',
            'value' => 10.00,
            'date' => '2021-01-01',
            'type' => 'food'
        ], [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(201);
    }

    /**
     *  Get expenses test.
     */
    public function test_get_expenses(): void
    {
        $this->test_get_auth();

        $response = $this->getJson('/api/expenses', [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(200);

        $response = json_decode($response->getContent());

        $this->assertIsArray($response->expenses);
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
