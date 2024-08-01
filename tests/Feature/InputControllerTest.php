<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInput()
    {   
        $this->get("input/hello?name=adi")
        ->assertSeeText("Hello adi");
        
        $this->post("input/hello", [
            "name" => "Adi"
        ])->assertSeeText("Hello Adi");
    }

    public function testNestedInput() {
        $this->post("hello/helloFirst", 
        [$name = [
            "first" => "Adi"
        ]])->assertSeeText("Hello, Adi");
        
    }
    
    public function testInputAll() {
        $this->post("input/helloInput", [
        "name" => [
            "first" => "adi",
            "last" => "salafudin",
            
        ]
        ]
        )->assertSeeText("adi")->assertSeeText("first")->assertSeeText("last");
    }

    public function testNameAll() {
        $this->post("input/name", [
            "products" => [
                    ["name" => "onion"],
                    ["name" => "olive oil"],
                    ["name" => "paper"],
            ]
        ])->assertSeeText("onion")->assertSeeText("olive oil");
        
    }
}
