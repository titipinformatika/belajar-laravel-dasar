<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Service\HelloService;
use App\Service\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
 
    public array $singletons=[
        HelloService::class=>HelloServiceIndonesia::class
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        
        echo "FoooBarServiceProvider";
        $this->app->singleton(Foo::class,function(){
            return new Foo();
        });

        $this->app->singleton(Bar::class,function($app){
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides():array{
        
        return[
            HelloService::class,
            Foo::class,
            Bar::class
        ];
    }
}
