<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    // authentikasi
    public function testAuth()
    {
        // kirim seeder
        $this->seed(UserSeeder::class);

        // auth:: attempt = melakukan login dengan credential
        $success = Auth::attempt([
            "email" => "abil@localhost",
            "password" => "rahasia"
        ], true);
        self::assertTrue($success);

        $user = Auth::user(); // mendapatkan informasi user yang sedang login
        self::assertNotNull($user); // pastikan tidak null
        self::assertEquals("abil@localhost", $user->email); // equesl pastikan sama dengan data di user email
    }

    // tamu yang login
    public function testGuest()
    {
        $user = Auth::user();
        self::assertNull($user);
    }

    // public function testLogin()
    // {
    //     $this->seed([UserSeeder::class]);

    //     $this->get("/users/login?email=eko@localhost&password=rahasia")
    //         ->assertRedirect("/users/current");

    //     $this->get("/users/login?email=salah&password=rahasia")
    //         ->assertSeeText("Wrong credentials");
    // }

    // public function testCurrent()
    // {
    //     $this->seed([UserSeeder::class]);

    //     $this->get("/users/current")
    //         ->assertStatus(302)
    //         ->assertRedirect("/login");

    //     $user = User::where("email", "eko@localhost")->firstOrFail();
    //     $this->actingAs($user)
    //         ->get("/users/current")
    //         ->assertSeeText("Hello Eko Kurniawan");
    // }

    // public function testTokenGuard()
    // {
    //     $this->seed([UserSeeder::class]);

    //     $this->get("/api/users/current", [
    //         "Accept" => "application/json"
    //     ])
    //         ->assertStatus(401);

    //     $this->get("/api/users/current", [
    //         "Accept" => "application/json",
    //         "API-Key" => "secret"
    //     ])
    //         ->assertSeeText("Hello Eko Kurniawan");
    // }

    // public function testUserProvider()
    // {
    //     $this->seed([UserSeeder::class]);

    //     $this->get("/simple-api/users/current", [
    //         "Accept" => "application/json"
    //     ])
    //         ->assertStatus(401);

    //     $this->get("/simple-api/users/current", [
    //         "Accept" => "application/json",
    //         "API-Key" => "secret"
    //     ])
    //         ->assertSeeText("Hello Khannedy");
    // }
}
