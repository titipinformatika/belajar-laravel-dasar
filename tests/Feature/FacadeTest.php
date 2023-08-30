<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
   function testConfig(){
    // get config with helper function
    $config1 = config("contoh.author.first");
    
    // Get config with Facades Config
    $config2 = Config::get("contoh.author.first");
    self::assertEquals($config1,$config2);
    // var_dump(Config::all());

   }

   function testConfigDependency(){
    // mengambil lansung di service container
    $config = $this->app->make("config");
    $firstname1 = $config->get("contoh.author.firstname");
    
    // mengambil lewat Facades
    $firstname2 = Config::get("contoh.author.firstname");

    $this->assertEquals($firstname1,$firstname2);

    // var_dump($config->all());
   }

   function testMockConfig(){

    Config::shouldReceive('get')
    ->with("contoh.author.firstname")
    ->andReturn("Asep Riki Keren");

    $config = Config::get("contoh.author.firstname");
    self::assertEquals("Asep Riki Keren",$config);

   }
}
