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

    function testRouteParameter(){
        $this->get('/product/1')
        ->assertSeeText("Product : 1");

        $this->get("/products/90/categories/90")
        ->assertSeeText("Product : 90 Category: 90");
    }

    function testRouterParameterRegex(){
        $this->get("/category/90")
        ->assertSeeText("Category Id : 90");

        $this->get("/category/salah")
        ->assertSeeText("404 by Titip Informatika");
    }

    function testRoutingConflict(){
        $this->get("/conflict/Asep")
        ->assertSeeText("conflict Asep");

        $this->get("/conflict/riki")
        ->assertSeeText("conflict riki");
    }

    function testNamed(){
        $this->get("produk/90")->assertSeeText("product/90");
        $this->get("produk-redirect/test")->assertRedirect("product/test");
    }
}
