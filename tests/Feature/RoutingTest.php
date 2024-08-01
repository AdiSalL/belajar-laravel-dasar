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
        ->assertSeeText("Hello, Adi !");
    }

    public function testFallback() {
        $this->get("/madang")
        ->assertSeeText("Halaman Tidak Tersedia || 404 Status Not Found");
    }

    public function testRouteParamater() {
        $this->get("/products/2")->assertSeeText("Product ID : 2");
    }
    public function testRouteParamaterWithItems() {
        $this->get("/products/2/items/XXX")->assertSeeText("Product ID : 2, Item XXX");
    }

    public function testRouteParamaterRegEx() {
        $this->get("/categories/1/tags/a")->assertSeeText("Category ID : 1 with the tags : a");
    }

    public function testOptionalParamter() {
        $this->get("/user/1")->assertSeeText("User ID : 1");
        $this->get("/user")->assertSeeText("User ID : 404");
    }

    public function testNamedRoute() {
        $this->get("/produk/1")->assertSeeText("Link http://localhost/products/1");
    }

}
