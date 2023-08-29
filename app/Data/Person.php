<?php
namespace App\Data;
class Person{
    public string $firstName;
    public string $lastName;

    public function __construct(string $firstname,string $lastname){
        $this->firstName=$firstname;
        $this->lastName = $lastname;
    }
}