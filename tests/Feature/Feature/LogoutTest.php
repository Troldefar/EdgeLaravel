<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class LogoutTest extends TestCase
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

    public function testUserIsLoggedOutProperly()
    {
        $user = factory(User::class)->create(['email' => 'test@test.dk']);
        $token = $user->generateToken();
        $headers = ['Authorization' => 'Bearer $token'];

        $this->json('get', '/api/bagdes', [], $headers)->assertStatus(200);
        $this->json('post', '/api/logout', [], $headers)->assertStatus(200);

        $user = User::find($user->id);
        $this->assertEquals(null, $user->api_token);
    }

    public function testUserWithNullToken()
    {
        // Fake login
        $user = factory(User::class)->create(['email' => 'test@test.dk']);
        $token = $user->generateToken();
        $headers = ['Authorization' => 'Bearer $token'];

        // Fake logout
        $user->api_token = null;
        $user->save();

        /** Should return 401 if logout is handled correctly
         * Test API required endpoint
         */
        $this->json('get', '/api/bagdes', [], $headers)->assertStatus(401);
    }
}
