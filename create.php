<?php
session_start();


if (!isset($_SESSION['user_id'])) {

    header("Location: user.php");
    exit(); 
}
?>
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

    $sql ="INSERT INTO `sanpham`(`ID`, `TenSanPham`, `SoLuong`, `Gia`, `IDDanhMuc`) VALUES ('$ID','     $TenSanPham ','$SoLuong ',' $Gia',' $IDDanhMuc')";

    $result1 = mysqli_query($con, $sql);
echo "Add Thanh Cong";
header('Location: DanhMucSanPham.php');
exit;



?>