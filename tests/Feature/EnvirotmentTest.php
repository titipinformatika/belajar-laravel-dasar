<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class EnvirotmentTest extends TestCase
{

    function testEnv(){
        $chanel = getenv("YOUTUBE");
        $chanel1 = $_SERVER['YOUTUBE'];
        $chanel2 = getenv("YOUTUBE");
        $this->assertEquals("Titip Informatika", $chanel);
        $this->assertEquals("Titip Informatika", $chanel1);
        $this->assertEquals("Titip Informatika", $chanel2);
    }

    function testDefaultEnv(){
        $author = env("AUTHOR","Asep Riki");
        $chanel = Env::get("CHANNEL","Titip Informatika");

        $this->assertEquals("Asep Riki", $author);
        $this->assertEquals("Titip Informatika", $chanel);
    }

    function testEnvirotment(){
        if(App::environment("testing")){
            echo "LOGIC IN TESTING ENV";
            $this->assertTrue(true);
        }else{
            echo "LOGIC IN PRODUCTION ENV";

            $this->assertTrue(true);

        }
    }

}
