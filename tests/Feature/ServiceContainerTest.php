<?php

namespace Tests\Feature;


use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testDependancyInjection() {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);
        
        self::assertNotSame($foo, $foo2);
        self::assertEquals("FOO", $foo->foo());
    }  
    
    public function testBind() {
        $this->app->bind(Person::class, function($app){
            return new Person("Adi", "Salafudin");
        });
        $person = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);
        
        self::assertEquals("Salafudin", $person->getLastName());
        self::assertEquals("Adi", $person2->getFirstName());
        self::assertNotSame($person, $person2);
    }

    public function testSingleton() {
        $this->app->singleton(Person::class, function($app){
            return New Person("Adi", "Salafudin");
        });

        $person = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

    
        self::assertSame($person, $person2);
    }
}
