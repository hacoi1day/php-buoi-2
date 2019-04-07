<?php

class HocSinh {
    var $id;
    var $name;
    var $age;
    var $address;

    function __construct($id, $name, $age, $address) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    

    public function display() {
        echo $this->id . ' - ' . $this->name . ' - ' . $this->age . ' - ' . $this->address;
    }
}

$ha = new HocSinh(1, 'Vũ Thanh Hà', 21, 'Hà Nội');
$ha->display();



?>