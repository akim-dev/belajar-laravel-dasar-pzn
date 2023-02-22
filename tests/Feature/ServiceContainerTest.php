<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceContainerTest extends TestCase
{
   public function testDependencyInjettion(){
    // $foo= new Foo();
    $foo = $this->app->make(Foo::class); // new Foo();
    $foo1 = $this->app->make(Foo::class); // new Foo();


    self::assertEquals('Foo', $foo->foo());
    self::assertEquals('Foo', $foo1->foo());
    self::assertNotSame($foo, $foo1);

   }

   public function testBind() {
    // $person = $this->app->make(Person::class);

    $this->app->bind(Person::class,function($app){
        return new Person ("Akim", "John");
    });
    $person = $this->app->make(Person::class);
    $person1 = $this->app->make(Person::class);

    // self::assertNotNull($person);
    self::assertEquals('Akim', $person->firstName);
    self::assertEquals('John', $person->lastName);
    self::assertNotSame($person1, $person);
   }


   public function testSingleton() {
    // $person = $this->app->make(Person::class);

    $this->app->singleton(Person::class,function($app){
        return new Person ("Akim", "John"   );
    });
    $person = $this->app->make(Person::class);
    $person1 = $this->app->make(Person::class);

    self::assertNotNull($person);
    self::assertEquals('John', $person->lastName);
    self::assertSame($person1, $person);
   }

   public function testInstance() {
    // $person = $this->app->make(Person::class);

    $this->app->instance(Person::class,function($app){
        return new Person ("Akim", "John");
    });
    $person = $this->app->make(Person::class);//$person
    $person1 = $this->app->make(Person::class);//$person
    $person2 = $this->app->make(Person::class);//$person
    $person3 = $this->app->make(Person::class);//$person

    self::assertNotNull($person);
    self::assertEquals('John', $person->lastName);
    self::assertSame($person1, $person);
   }



}
