<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestRequest extends TestCase
{
    public function testRequest()
    {
        $this->get('/controller/hello/request', [
            'Accept' => 'plain/text',
        ])->assertSeeText('/controller/hello/request')
            ->assertSeeText('http://localhost/controller/hello/request')
            ->assertSeeText('GET')
            ->assertSeeText('plain/text');
    }

    public function testInput()
    {
        $this->get('/input/hello?name=Eko')->assertSeeText('hello Eko');
        $this->post('/input/hello', ['name' => 'Eko'])->assertSeeText('Hello Eko');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/all', [
            'name' => [
                'first' => 'Eko',
                'last' => 'Khannedy'
            ]
        ])->assertSeeText('name')->assertSeeText('first')
            ->assertSeeText('last')->assertSeeText('Eko')->assertSeeText('Khannedy');
    }
}
