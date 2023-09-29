<?php
session_start();


if (!isset($_SESSION['user_id'])) {

    header("Location: user.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

</form>

<body>
    <?php include('menu.php')

    ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);

    $id = $_GET['IDDM'];
    $TenDanhMuc = $_GET['TenDanhMuc'];
   ;





    //  $con = mysqli_connect($servername, $username, $pass, $database);





    ?>
    <form action="updatedanhmuc.php" method="post">
        <h4>Sửa Sản Phẩm</h4>
        <div>
            <label>IDDM </label><br>
            <input type="text" name="IDDM" value="<?php echo  $id ?>"><br>
            <label>Tên Danh Muc:</label><br>
            <input type="text" name="TenDanhMuc" value="<?php echo     $TenDanhMuc ?>"><br>

            <input type="submit" value="Update">
        </div>
    </form>
</body>

</html>