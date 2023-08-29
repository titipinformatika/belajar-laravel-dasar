<?php
namespace App\Data;

class Bar{
    public Foo $foo;
    function __construct(Foo $foo){
        $this->foo = $foo;
    }

    function Bar():string{
        return $this->foo->foo() ." and Bar";
    }
}