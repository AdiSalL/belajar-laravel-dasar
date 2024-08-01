<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHello()
    {
        $this->get("/controller/hello/adi")->assertSeeText("Halo, Bagaimana Kabar ? adi");
    }

    public function testRequest() {
        $this->get("/controller/request", ["Accept" => header("plain/text")])
        ->assertSeeText("controller/request");
        // ->assertSeeText("http://localhost:8000/controller/request")
        
    }
}
