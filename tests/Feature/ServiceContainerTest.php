<?php

namespace Tests\Feature;


use App\Data\Foo;
use App\Data\Bar;
use App\Data\Person;
use App\Services\HelloServices;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testDependancy() {
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

    public function testInstance() {
        $person = new Person("Adi", "Salafudin");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Adi", $person1->getFirstName());
        self::assertEquals("Adi", $person2->getFirstName());

        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
        
    }

    public function testDependancyInjection(){
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);
        

        self::assertSame($foo, $bar->foo);
        self::assertSame($bar, $bar2);
        
    }

    public function testInterfaceToClass() {
        // $this->app->singleton(HelloServices::class, HelloServiceIndonesia::class);
        $this->app->singleton(HelloServices::class, function($app) {
            return new HelloServiceIndonesia();
        });
        

        $helloServiceIndonesia = $this->app->make(HelloServices::class);
        self::assertEquals("Halo, Bagaimana Kabar ? " . "adi", $helloServiceIndonesia->hello("adi"));
    }

}
