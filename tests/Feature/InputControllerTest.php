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
        
        // $this->post("input/hello", [
        //     "name" => "Adi"
        // ])->assertSeeText("Hello Adi");
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

    public function testinputType() {
        $this->post("input/type", [
            "name" => "Budi",
            "married" => "true",
            "birth_date" => "2002-10-10"
        ])->assertSeeText("Budi")->assertSeeText("true")->assertSeeText("2002-10-10");
    }

    public function testFilterOnly(){
        $this->post("/input/filter/only", [
            "name" => [
                "first" => "adi",
                "middle" => "mightiest",
                "last" => "salafudin"
            ]
        ])->assertSeeText("adi")->assertDontSeeText("mightiest");
    }

    
    public function testExcept(){
        $this->post("input/filter/except", [
            "name" => [
                "first" => "adi",
                "admin" => true,
                "last" => "salafudin"
            ] 
        ])->assertSeeText("adi")->assertDontSeeText(true);
    }

    public function testFilterMerge(){
        $this->post("input/filter/merge", [
            "name" => [
                "first" => "adi",
                "admin" => true,
                "last" => "salafudin"
            ] 
        ])->assertSeeText("adi")->assertSeeText("admin")->assertSeeText(false);
    }


}
