<?php
namespace App\Service;

class HelloServiceIndonesia implements HelloService{

    function hello(string $name):string{
        return "Hello $name";
    }
}