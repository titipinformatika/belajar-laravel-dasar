<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    function testBasicRouting(){
        $this->get("/tifor")
        ->assertSeeText("Hello Titip Informatika")
        ->assertStatus(200);
    }

    function testRedirect(){
        $this->get("/youtube")
        ->assertRedirect("/tifor");
       
    }

    function testFallBack(){
        $this->get("/404")->assertSeeText("404 by Titip Informatika");
        $this->get("/gakada")->assertSeeText("404 by Titip Informatika");
        $this->get("/upss")->assertSeeText("404 by Titip Informatika");
    }

    function testView(){
        $this->get('/hello')
        ->assertSeeText("Hello Asep Riki");

        $this->get('/hello-lagi')
        ->assertSeeText("Hello Rendi Apriandi");
    }
}
