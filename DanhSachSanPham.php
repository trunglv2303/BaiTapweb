<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Danh Sách Sản Phẩm</title>
</head>
<style>
    
</style>
<?php include('menu.php'); ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Image</th>
            <th>Mô Tả</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <h1>Danh Sách Sản Phẩm</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $database = "banhang1";
        $con = mysqli_connect($servername, $username, $pass, $database);
        $sql = "SELECT * FROM sanpham WHERE IDDanhMuc = " . $_GET['IDDM'];
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
            <td>' . $row["ID"] . '</td>
            <td>' . $row["TenSanPham"] . '</td>
            <td style="vertical-align: middle; text-align: center;">' . $row["SoLuong"] . '</td>
            <td style="vertical-align: middle; text-align: center;">' . $row["Gia"] . '</td>
            <td style="width:10%; vertical-align: middle; text-align: center;">' . '<img style="width:80%" src="uploads/' . $row['Image'] . '" alt="">' . '</td>
            <td>' . $row["Mota"] . '</td>
            <td><a href="SuaSanPham.php?ID=' . $row["ID"] . '&TenSanPham=' . $row["TenSanPham"] .'&Mota=' . $row["Mota"].'&Image=' . $row["Image"]. '&SoLuong=' . $row["SoLuong"] . '&Gia=' . $row["Gia"] . '&Image=' . $row["Image"] . '&Mota=' . $row["Mota"] . '&IDDanhMuc=' . $row["IDDanhMuc"] . '">Sửa</a></td>
            <td><a href="Delete.php?ID=' . $row["ID"] . '">Xóa</a></td>
        </tr>';
        
        }




        ?>

    <tbody>

</table>

</body>

</html>