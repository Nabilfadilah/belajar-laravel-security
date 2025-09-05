<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HashTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // hash password
    public function testHash()
    {
        $password = "rahasia";
        $hash = Hash::make($password);

        $result = Hash::check("rahasia", $hash);
        self::assertTrue($result);
    }
}
