<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBasicRouting()
    {
        $response = $this->get('/adi');

        $response->assertStatus(200)
        ->assertSeeText("Hello World");
    }

    public function testRedirect() {
        $this->get("/hello")
        ->assertRedirect("/adi")
        ->assertFound("/adi");
    }

    public function testFallback() {
        $this->get("/madang")
        ->assertSeeText("Halaman Tidak Tersedia || 404 Status Not Found");
    }
}
