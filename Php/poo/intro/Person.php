<?php

class Person
{
    
    private $lastname;

    private $firstname;


    public function __construct(string $_lastname, string $_firstname)
    {
        $this->lastname = $_lastname;
        $this->firstname = $_firstname;
    }

    public function getLastname()
    {
        return mb_convert_case($this->lastname, MB_CASE_UPPER);
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getInfos()
    {
        //return "$this->lastname $this->firstname";
        return ($this->getLastname() . ' ' . $this->firstname . "\n");

        //return 
    }

    public function setLastname(string $_newname)
    {
        $this->lastname = $_newname;
    }


}