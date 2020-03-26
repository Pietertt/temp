<?php

namespace classes;

class Person
{
    public $first_name;
    public $last_name;
    public $Gender;
    public $Born_age;
    public $Telephone;
    public $Email;

    //validations for user
    public function getFirstName($first_name){
        return $this->first_name;
    }

    public function getLastName($last_name){
        return $this->last_name;
    }

    public function getGender($Gender){
        return $this->Gender;
    }

    public function getBornAge($Born_age){
        return $this->Born_age;
    }

    public function  getTelephone($Telephone){
        return $this->Telephone;
    }

    public function getEmail($Email){
        return $this->Email;
    }
}

