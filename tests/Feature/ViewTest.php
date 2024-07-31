<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testViewTest()
    {
        $response = $this->get('/hello');
        $response->assertStatus(200)
        ->assertSeeText("Hello, Adi !");
    }

    public function testViewWorld()
    {
        $response = $this->get('/world');
        $response->assertStatus(200)
        ->assertSeeText("Hello World;, Salafudin !")
        ->assertSeeText("saya sudah belajar laravel selama 3 hari di channel PZN");
    }
}
