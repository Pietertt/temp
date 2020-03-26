<?php


namespace classes;


class Hypotheek
{

    public $application_date;
    public $message;
    public $edit;

    //validations for Hypotheek

    public function getApplication_date($application_date){
        return $this->application_date;
    }

    public function getMessage($message){
        return $this->message;
    }

    public function getEdit($edit){
        return $this->edit;
    }

}