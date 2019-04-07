<?php

class Calculator {
    // propertys
    var $num1;
    var $num2;

    // construct
    function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    // methods
    public function add() {
        return $this->num1 + $this->num2;
    }
    public function minus() {
        return $this->num1 - $this->num2;
    }
    public function multiple() {
        return $this->num1 * $this->num2;
    }
    public function devide() {
        try {
            if($this->num2 == 0) {
                throw new Exception('num2 không được bằng 0.');
            }
            $result = $this->num1 / $this->num2;
        } catch(Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
}


?>