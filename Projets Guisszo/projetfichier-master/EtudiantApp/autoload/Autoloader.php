<?php
class Autoloader{
    static function autoreg(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
    static function autoload($class){
        include '../classes/'.$class . '.php';
    }
}