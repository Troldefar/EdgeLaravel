<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                'email' => ['The email field is required'],
                'password' => ['The password field is required']
            ]);
    }

    public function testUserLoginsSuccessfully()
    {
        factory(User::class)->create([
            'email' => 'test@test.dk',
            'password' => bcrypt('edgetest')
        ]);

        $payload = ['email' => 'test@test.dk', 'password' => 'edgetest'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token'
                ]
            ]);
    }
}
