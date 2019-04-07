<?php

// base class
require_once('myPDO.php');

// user class
class myUser extends myPDO {
    /**
     * Tạo bảng trong Datababse
     * Input:
     *      $tablename - tên bảng cần tạo
     *      $arrPro - các thuộc tính của mảng, là một mảng 2 chiều
     *      ['tên thuộc tính, kiểu dữ liệu, các giá trị khác]
     *      Kiểu dữ liệu:
     *          INT(6)
     *          VARCHAR(50)
     *          DATE
     *          TINYINT
     *          TEXT
     *          ...
     *      Giá trị khác gồm:
     *          AUTO_INCREMENT - tự động tăng
     *          NOT NULL - không được rỗng
     * Output:
     *      true - tạo bảng thành công
     *      false - tạo bảng thất bại
     */
    public function createTable($tablename, $arrPro) {
        $sqlS = 'CREATE TABLE IF NOT EXISTS '. $tablename .' (';
        $sql = [];
        foreach($arrPro as $arr) {
            $tmp = '';
            $tmp .= implode(' ', $arr);
            array_push($sql, $tmp);
        }
        $sql = implode(', ', $sql);
        $sqlE = ')';
        $sql = $sqlS . ' ' . $sql . ' ' . $sqlE;
        // echo $sql;
        // die();
        $this->conn->exec($sql);
        echo "Thêm bản $tablename thành công" . '<br>';
    }

    /**
     * Hàm thêm các bản ghi vào bảng
     * Input:
     * Output:
     */
    public function insertUser($tablename, $name, $email, $address) {
        // INSERT INTO `users`(`name`, `email`, `address`) VALUES ('havt','vuha','hanoi')
        $sqlS = "INSERT INTO `users`(`name`, `email`, `address`)";
        $sqlE = "VALUES ('$name', '$email', '$address')";
        $sql = $sqlS . ' ' . $sqlE;
        echo $sql;
        $this->conn->query($sql);
        echo 'Thêm bản ghi thành công';
    }

    /**
     * Truy vấn Database
     * Input:
     *      $table - bảng cần truy vấn
     *      $arrPro - mảng các giá trị cần truy cấn
     */
    public function querySQL($table, $arrPro) {
        $this->conn->setFetchMode(PDO::FETCH_ASSOC);
        // $users->setFetchMode(PDO::FETCH_ASSOC);
        $users = $this->conn->query('SELECT * from `users`');
        // $users->setFetchMode(PDO::FETCH_ASSOC);
        echo '<pre>';
        print_r($users);
        echo '</pre>';
    }
}

$user = new myUser('localhost', 'root', '', 'dbpdo');

$user->createDatabase('dbpdo');
$arrPro = [
    ['id', 'INT(6)', 'AUTO_INCREMENT', 'PRIMARY KEY'],
    ['name', 'VARCHAR(50)', 'NOT NULL'],
    ['email', 'VARCHAR(50)', 'NOT NULL'],
    ['address', 'VARCHAR(255)'],
];
$tablename = 'users';
$user->createTable($tablename, $arrPro);
// $user->insertUser($tablename, 'haco1iday', 'vuha98.tn@gmail.com', 'Hanoi2');
$user->querySQL($tablename, ['name', 'email', 'address']);
?>