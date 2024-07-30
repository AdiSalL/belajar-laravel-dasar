<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function testServiceProvider(){
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);    
        
        self::assertSame($foo, $foo2);

        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar, $bar2);

        self::assertSame($bar->foo, $foo);
        
    }

    public function testPropertySingletons() {
        
    }
}
