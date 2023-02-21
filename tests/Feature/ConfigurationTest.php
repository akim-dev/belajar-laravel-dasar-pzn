<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
  public function testConfig(){
    $firstName = config('contoh.author.first');
    $lastName = config('contoh.author.last');
    $email = config('contoh.email');
    $website = config('contoh.website');

    self::assertEquals('Akim', $firstName);
    self::assertEquals('Akim', $lastName);
    self::assertEquals('paijo@paijo.com', $email);
    self::assertEquals('www.paijo.com', $website);
  }
}
