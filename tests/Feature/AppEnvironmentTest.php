<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\ExceptionWrapper;
use Tests\TestCase;


class AppEnvironmentTest extends TestCase
{
    public function testAppEnv() {
        if(app()->environment(["testing", "prod", "dev"])){
            self::assertTrue(true);
        }
    }
}
