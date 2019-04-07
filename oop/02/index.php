<?php
    include_once('calculator.php');

    if(isset($_POST['num1']) && isset($_POST['num2'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $cal = $_POST['cal'];

        $tinhtoan = new Calculator($num1, $num2);
        $result;
        switch($cal) {
            case 1:
                $result = $tinhtoan->add();
                break;
            case 2:
                $result = $tinhtoan->minus();
                break;
            case 3:
                $result = $tinhtoan->multiple();
                break;
            case 4:
                $result = $tinhtoan->devide();
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài 2</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>Number 1:</td>
                <td>
                    <input type="number" name="num1" value="<?php echo isset($num1) ? $num1 : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>Number 2:</td>
                <td>
                    <input type="number" name="num2" value="<?php echo isset($num2) ? $num2 : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>Calculator:</td>
                <td>
                    <select name="cal" id="cal">
                        <option value="1" <?php echo ($cal == 1) ? 'selected' : ''; ?>>Cộng</option>
                        <option value="2" <?php echo ($cal == 2) ? 'selected' : ''; ?>>Trừ</option>
                        <option value="3" <?php echo ($cal == 3) ? 'selected' : ''; ?>>Nhân</option>
                        <option value="4" <?php echo ($cal == 4) ? 'selected' : ''; ?>>Chia</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Result:</td>
                <td>
                    <input type="text" value="<?php echo (isset($result)) ? $result : ''; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Calculator</button>
                </td>
            </tr>
        </table>

    </form>


</body>
</html>