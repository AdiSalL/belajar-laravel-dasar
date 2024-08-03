<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEnryption()
    {
        $encrypt = Crypt::encrypt("Eko Kurniawan");
        var_dump($encrypt);

        $decrypt = Crypt::decrypt($encrypt);

        self::assertEquals("Eko Kurniawan", $decrypt);
    }
}
