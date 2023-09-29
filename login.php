<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username1 = $_POST['username'];
    $password = $_POST['password'];
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);
    $sql = "SELECT `Username`, `Password` FROM `users`   WHERE Username='$username1' and Password=$password ";
    echo $sql;
    $resu 
    lt1 =  mysqli_query($con, $sql);
    if ($sql) {
        $_SESSION['user_id'] = 1;
        header("Location: DanhMucSanPham.php");
        exit();
    } else {
        $error_message = "Sai tên đăng nhập hoặc mật khẩu.";
    }
}
?>