<?php
    require_once "Animal.php";
    
    class Gato extends Animal{
        public function falar(){
            echo "Miar";
        }
    }