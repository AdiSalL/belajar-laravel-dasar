<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use App\Services\HelloServices;
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
        $helloService1 = $this->app->make(HelloServices::class);
        $helloService2 = $this->app->make(HelloServices::class);
        
        self::assertSame($helloService1, $helloService2);

        self::assertEquals("Halo, Bagaimana Kabar ? Adi", $helloService1->hello("Adi"));

    }

    public function testEmpty(){
        self::assertTrue(true);
    }
}
