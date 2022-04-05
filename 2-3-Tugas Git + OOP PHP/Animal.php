<?php

class Animal
{
    public $name = "";
    public $legs = 4 ;
    public $cold_blooded = false;

    public function __construct($name){
        return $this->name = $name;
    }

    public function getName(){
        return $this->name. "<br>";
    }

    public function getLegs(){
        return $this->legs. "<br>";
    }

    public function getColdBlooded(){
        return (boolval($this->cold_blooded)? 'Yes<br>' : 'No<br>');
    }


}