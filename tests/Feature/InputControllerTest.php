<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
   function testInput(){
    $this->get("input/hello?name=Asep")->assertSeeText("Hello Asep");
    $this->post("input/hello",["name"=>"Rendi"])->assertSeeText("Hello Rendi");
   }

   function testInputNested(){
    $this->post("input/hello/nested",["name"=>["first"=>"Asep","last"=>"Riki"]])
    ->assertSeeText("Hello Asep");
   }

   function testInputAll(){
    $this->post("/input/hello/input",[
        "name"=>[
            "first"=>"Asep",
            "last"=>"Riki"
        ]
    ])
    ->assertSeeText("name")
    ->assertSeeText("first")
    ->assertSeeText("Asep")
    ->assertSeeText("Riki");
   }

   function testArrayInput(){

    $data =[
        "product"=>[
            ["name"=>"Macbook M2"],
            ["name"=>"Samsung Galax S10"]
        ],
        "category"=>[
            ["name"=>"Laptop"],
            ["name"=>"Hanphone"]
        ],
    ];

    $this->post("/input/hello/array",$data)
    ->assertSeeText("Macbook M2")->assertSeeText("Samsung Galax S10");

   }


}
