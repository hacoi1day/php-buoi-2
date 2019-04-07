<?php

$servername = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE myDBPDO";

    $conn->exec($sql);
    echo "Tạo DB thành công.";

} catch(PDOExcaption $e) {
    echo $sql . '<br>' . $e->getMessage();
}
$conn = null;

?>