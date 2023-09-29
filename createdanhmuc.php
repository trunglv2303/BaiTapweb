<?php
session_start();


if (!isset($_SESSION['user_id'])) {
echo " Bạn Càn Đăng Nhập";
    header("Location: user.php");
    exit(); 
}
?>
?>
<?php   
$ID = $_POST['IDDM'];
    $TenDanhMuc = $_POST['TenDanhMuc'];
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);

    $sql ="INSERT INTO `danhmuc`(`IDDM`, `TenDanhMuc`) VALUES ('$ID','$TenDanhMuc')";
    echo $sql;
    $result1 = mysqli_query($con, $sql);   
echo "Add Thanh Cong";
header('Location: DanhMucSanPham.php');
exit;



?>