<?php
    require_once "Animal.php";
    
    class Cachorro extends Animal{
        public function falar(){
            echo "Latir";
        }
    }