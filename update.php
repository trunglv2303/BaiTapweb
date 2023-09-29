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
    $ID = $_POST['ID'];
    $TenSanPham = $_POST['TenSanPham'];
    $SoLuong = $_POST['SoLuong'];
    $Gia = $_POST['Gia'];
    $IDDanhMuc = $_POST['IDDanhMuc'];
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);

    $sql ="UPDATE `sanpham` SET `TenSanPham`='    $TenSanPham',`SoLuong`=' $SoLuong',`Gia`='    $Gia',`IDDanhMuc`='    $IDDanhMuc ' WHERE ID= $ID";
    echo $sql;
    $result1 = mysqli_query($con, $sql);
    header('Location: DanhMucSanPham.php');
       ?>