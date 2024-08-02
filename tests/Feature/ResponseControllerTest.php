<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testResponse()
    {
        $response = $this->get('hello/response');

        $response->assertStatus(200);
        $response->assertSeeText("Hello Response");
    }

    public function testHeader() {
        $this->get("hello/header")
        ->assertStatus(200)
        ->assertSeeText("Adi")->assertSeeText("Santoso")
        ->assertHeader("Content-Type", "application/json")
        ->assertHeader("Author", "adisalafudin")
        ->assertHeader("App", "Belajar Laravel");
    }

    public function testView() {
        $this->get("hello/view")
        ->assertStatus(200)
        ->assertSeeText("Hello, Adi !");
    }

    
    public function testJson() {
        $this->get("hello/json")
        ->assertStatus(200)
        ->assertJson(["firstName" => "Adi", "lastName" => "Santoso"]);
    }

    
    public function testFile() {
        $this->get("hello/file")
        ->assertHeader("Content-type", "image/jpeg");
    }

    public function testFileDownload() {
        $this->get("hello/file/download")
        ->assertDownload("448370655_1876164399521433_7688111721485699649_n.jpg");
    }


}
