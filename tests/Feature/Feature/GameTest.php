<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
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

    public function canSearchForGame()
    {

    }

    public function canCreateGroups()
    {

    }

    public function canCancelGame()
    {

    }

    public function canHonorMember()
    {

    }

    public function canReportMember()
    {
        
    }
}
