<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTesting extends TestCase
{
  public function testRouting(){
    $this->get('/home')
    ->assertStatus(200)
    ->assertSeeText('Hello World');
  }
}
