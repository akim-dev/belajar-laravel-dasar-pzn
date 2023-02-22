<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
  public function testServiceProvider(){

      $foo = $this->app->make(Foo::class);
      $foo2 = $this->app->make(Foo::class);

      self::assertSame($foo, $foo2);
      $bar1= $this->app->make(Bar::class);
      $bar2 = $this->app->make(Bar::class);

      self::assertSame($bar1, $bar2);
  }

}
