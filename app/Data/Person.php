<?php

namespace App\Data;

class Person {
    private string $firstName;
    private string $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        
    }

    public function getFirstName(){
        return $this->firstName;
    }
    
    public function getLastName(){
        return $this->lastName;
    }
}