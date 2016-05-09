<?php
/**
 * Created by PhpStorm.
 * User: tairo
 * Date: 08/05/16
 * Time: 23:07
 */

abstract class Ligavel{
    public $ligado = false;
}

class Motor extends Ligavel{
    public function ligar(){
        $this->ligado = true;
    }
}

class Carro extends Ligavel{
    function ligar(){
        $this->ligado = true;
    }
}

$carro = new Carro();
$carro->ligar();