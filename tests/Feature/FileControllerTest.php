<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Testing\imagecreatetruecolor;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use  PHPUnit\Framework\ExceptionWrapper;

class FileControllerTest extends TestCase
{

    public function testUpload()
    {
        $image = UploadedFile::fake()->image("adi.jpeg");
        $this->post("/file/upload", [
            "picture" => $image
        ])->assertSeeText("OK adi.jpeg");
        
    }
}
 