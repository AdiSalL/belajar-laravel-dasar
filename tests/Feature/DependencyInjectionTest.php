<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDependancyInjection() {
        $foo = new Foo();
        $bar = new Bar($foo);

        self::assertSame("FOO And Bar", $bar->bar());
    }
}
