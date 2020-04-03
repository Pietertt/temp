<?php

namespace classes;

class emailValidation
{
    private $email;

    public function setEmail($Email)
    {
        $this->email = trim($Email);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function validateEmail($Email)
    {
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        else
        {
            $this->setEmail($Email);
        }
    }
}