<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
   function testBasicView(){
    $this->get("/hello")
    ->assertSeeText("Hello Asep Riki");
    $this->get("/hello-lagi")
    ->assertSeeText("Hello Asep Riki");
   }
}
