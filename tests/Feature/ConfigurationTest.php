<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{

    function testConfiguration(){
        $first = config("contoh.author.first");
        $last = config("contoh.author.last");
        $email = config("contoh.email");
        $web = config("contoh.web");
        $channel = config("contoh.channel","Titip Informatika");

        $this->assertEquals("Asep", $first);
        $this->assertEquals("Riki", $last);
        $this->assertEquals("titip.informatika@gmail.com", $email);
        $this->assertEquals("www.titip.informatika.com", $web);
        $this->assertEquals("Titip Informatika", $channel);
    }
}
