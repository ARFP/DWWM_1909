<?php
/** 
 * Mystring is a class simulates Javascript "String" class
 * 
 * @package mystring 
 * @author MDevoldere 
 * @version 1.0.0
 * @access public 
 * @see https://github.com/mdevoldere/DWWM_1909/tree/master/Php/mystring
 * @see https://github.com/mdevoldere/DWWM_1909/blob/master/Php/mystring/docs/MyString.svg
 */ 
class MyString
{

    protected $str;

    protected $length;


    public function __construct(string $input)
    {
        $this->str = $input;
        $this->length = strlen($this->str);
    }

    public function __toString()
    {
        return 'La chaine '. $this->str. ' est de longueur '. $this->length;
    }


    public function charAt(int $position)
    {
        return $this->str[$position] ?? '';
    }

    public function indexOf(string $char)
    {
        if(strlen($char) === 1) {
            return strpos($this->str, $char);
        }

        return -1;
    }

    public function substring(int $debut, int $fin)
    {
        return substr($this->str, $debut, $fin);
    }

    public function split(string $separateur)
    {
        return explode($separateur, $this->str);
    }

    public function toLowerCase()
    {
        // return strtolower($this->str);
        return mb_convert_case($this->str, MB_CASE_LOWER);
    }

    public function toUpperCase()
    {
        //return strtoupper($this->str);
        return mb_convert_case($this->str, MB_CASE_UPPER);
    }

    public function toTitle()
    {
        //return strtoupper($this->str);
        return mb_convert_case($this->str, MB_CASE_TITLE);
    }

    



} // fin de la classe MyString