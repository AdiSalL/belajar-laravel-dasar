<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    public function testConfig() {
        $firstName = config("contoh.author.first");
        $lastName = config("contoh.author.last");
        $email = config("contoh.email");
        $instagram = config("contoh.instagram");

        self::assertEquals("Adi", $firstName);
        self::assertEquals("Salafudin", $lastName);
        self::assertEquals("adiefsal@gmail.com", $email);
        self::assertEquals("Adi Salafudin", $instagram);
        
        
    } 
}
