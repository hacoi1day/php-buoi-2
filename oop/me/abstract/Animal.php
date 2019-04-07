<?php

abstract class Animal {
    protected $name;
    
    abstract function run();
}

class Dog extends Animal {
    public function run() {
        echo "Con chó chạy bằng 4 chân";
    }
}

class Person extends Animal {
    public function run() {
        echo "Con người chạy bằng 2 chân";
    }
}

?>