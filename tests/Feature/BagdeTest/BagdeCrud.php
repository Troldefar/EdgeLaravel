<?php

namespace Tests\Feature\BagdeTest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BagdeCrud extends TestCase
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

    public function testBagdeAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => 'Bearer $token'];
        $payload = [
            'title' => 'test bagde',
            'body' => 'test bagde body',
            'description' => 'test bagde description',
            'level' => 'test bagde level'
        ];

        $this->json('post', '/api/bagdes', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1, 
                'title' => 'test bagde', 
                'body' => 'test bagde body', 
                'description' => 'test bagde description', 
                'level' => 'test bagde level'
            ]);
    }

    public function testBagdeAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => 'Bearer $token'];

        $bagde = factory(Bagde::class)->create([
            'title' => 'test bagde', 
            'body' => 'test bagde body', 
            'description' => 'test bagde description', 
            'level' => 'test bagde level'
        ]);

        $payload = [
            'title' => 'test bagde put test', 
            'body' => 'test bagde body put test', 
            'description' => 'test bagde description put test', 
            'level' => 'test bagde level put test'
        ];

        $response = $this->json('put', '/api/bagdes/' . $bagde->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'title' => 'test bagde put test', 
                'body' => 'test bagde body put test', 
                'description' => 'test bagde description put test', 
                'level' => 'test bagde level put test'
            ]);
        
        return $response;
    }

    public function testBagdeAreDeletedCorrectly ()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => 'Bearer $token'];
        $bagde = factory(Bagde::class)->create([
            'title' => 'test bagde', 
            'body' => 'test bagde body', 
            'description' => 'test bagde description', 
            'level' => 'test bagde level'
        ]);

        $this->json('delete', '/api/bagdes/' . $bagde->id, [], $headers)
            // Return empty response since {id} was deleted
            ->assertStatus(204);
    }

    public function testBagdesAreListedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $bagde = factory(Bagde::class)->create([
            'title' => 'test bagde1', 
            'body' => 'test bagde body 1', 
            'description' => 'test bagde description 1', 
            'level' => 'test bagde level 1'
        ]);

        $secondBagde = factory(Bagde::class)->create([
            'title' => 'test bagde 2', 
            'body' => 'test bagde body 2', 
            'description' => 'test bagde description 2', 
            'level' => 'test bagde level 2'
        ]);

        $response = $this->json('get', '/api/bagdes', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [
                    'title' => 'test bagde1', 
                    'body' => 'test bagde body 1', 
                    'description' => 'test bagde description 1', 
                    'level' => 'test bagde level 1'
                ],
                [
                    'title' => 'test bagde 2', 
                    'body' => 'test bagde body 2', 
                    'description' => 'test bagde description 2', 
                    'level' => 'test bagde level 2'
                ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'body', 'title', 'description', 'level', 'created_at', 'updated_at']
            ]);
    }
}
