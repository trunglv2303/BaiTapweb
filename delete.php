<?php
session_start();


if (!isset($_SESSION['user_id'])) {

    header("Location: user.php");
    exit(); 
}
?>
?>
<?php include('menu.php')

?>
<?php
$ID = $_GET['ID'];
echo $ID = $_GET['ID'];
$servername = "localhost";
$username = "root";
$pass = "";
$database = "banhang1";
$con = mysqli_connect($servername, $username, $pass, $database);
$sql="DELETE FROM `sanpham` WHERE ID= $ID";
echo $sql;
$result1 = mysqli_query($con, $sql);
header('Location: DanhMucSanPham.php');

?>