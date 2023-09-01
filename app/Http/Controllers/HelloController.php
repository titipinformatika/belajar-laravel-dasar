<?php

namespace App\Http\Controllers;

use App\Service\HelloService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    // dependency Injection
    private HelloService $helloService;
    public function __construct(HelloService $helloService){
        $this->helloService = $helloService;
    }
    function hello(string $name="guest"){
        return $this->helloService->hello($name);
    }

    function request(Request $request){
        return $request->path().PHP_EOL.
        $request->url().PHP_EOL.
        $request->fullUrl().PHP_EOL.
        $request->method().PHP_EOL.
        $request->header("Accept").PHP_EOL;
    }
}
