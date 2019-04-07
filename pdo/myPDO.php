<?php

class myPDO {
    // properties
    var $conn;
    var $servername;
    var $username;
    var $password;
    var $database;
    // connect
    public function __construct($servername, $username, $password, $database = '') {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        // connect với DB
        if($this->database == '') {
            $this->conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
        } else {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        }
        // config
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Kết nối thành công" . '<br>';
    }
    // create database
    public function createDatabase($dataname) {
        // echo $dataname;
        $sql = 'CREATE DATABASE IF NOT EXISTS ' . $dataname;
        $this->conn->exec($sql);
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        echo "Tạo database $dataname thành công" . '<br>';
    }

    public function __destruct() {
        $this->conn = null;
    }


}

?>