<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileStorageTest extends TestCase
{
    public function testStorage()
    {
        $filesystem = Storage::disk('local');
        $filesystem->put('file.txt', 'Eko kurniawan khannedy');
        $contents = $filesystem->get('file.txt');

        $this->assertEquals('Eko kurniawan khannedy', $contents);
    }
    public function testPublic()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('file.txt', 'Eko kurniawan khannedy');
        $contents = $filesystem->get('file.txt');

        $this->assertEquals('Eko kurniawan khannedy', $contents);
    }
}
