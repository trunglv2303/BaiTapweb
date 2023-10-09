<?php
session_start();


if (!isset($_SESSION['user_id'])) {

    header("Location: user.php");
    exit(); 
}
?>

<?php   
 $target_dir = "uploads/"; // Thư mục để lưu trữ ảnh
 $target_file = $target_dir . basename($_FILES["Image"]["name"]);

 if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
 } else {
 }
$ID = $_POST['ID'];
    $TenSanPham = $_POST['TenSanPham'];
    $SoLuong = $_POST['SoLuong'];
    $Gia = $_POST['Gia'];
    $Image = $_POST['Image'];
    $Mota = $_POST['mota'];
    $IDDanhMuc = $_POST['IDDanhMuc'];
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);    
    $sql ="  INSERT INTO `sanpham`(`ID`, `TenSanPham`, `SoLuong`, `Gia`, `Image`, `Mota`, `IDDanhMuc`) VALUES ('$ID','$TenSanPham ','$SoLuong','$Gia','$Image','$Mota',' $IDDanhMuc')";
    echo $sql;
    $result1 = mysqli_query($con, $sql);
echo "Add Thanh Cong";
header('Location: DanhMucSanPham.php');
exit;



?>