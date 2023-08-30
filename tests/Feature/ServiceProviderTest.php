<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Service\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function testServiceProvider(){
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        $this->assertEquals("Foo",$foo->foo());
        self::assertSame($foo,$bar->foo);
    }

    public function testProperty(){
       $helloService = $this->app->make(HelloService::class);
       self::assertEquals("Hello Asep Riki",$helloService->hello("Asep Riki"));
    }
}
