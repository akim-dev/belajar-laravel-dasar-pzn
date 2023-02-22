<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTesting extends TestCase
{
    public function testRouting()
    {
        $this->get('/home')
            ->assertStatus(200)
            ->assertSeeText('Hello World');
    }

    public function testFallback()
    {
        $this->get('/home-again')
            ->assertSeeText('404 by PZN');
    }

    public function testRouteParameter()
    {
        $this->get('/products/1 ')
            ->assertSeeText('Product 1  ');
        $this->get('/products/2 ')
            ->assertSeeText('Product 2  ');
        $this->get('/products/1/items/xxx')
            ->assertSeeText('Product 1 , Items XXX');
    }
}
