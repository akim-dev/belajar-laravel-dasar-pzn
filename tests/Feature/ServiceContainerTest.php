<?php

namespace Tests\Feature;

use App\Data\Foo;
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
}
