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
<?php include('menu.php'); ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>IDDanhMuc</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php include('menu.php'); ?>
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
              <td>' . $row["SoLuong"] . '</td>
              <td>' . $row["Gia"] . '</td>
              <td>' . $row["IDDanhMuc"] . '</td>
              <td><a href="SuaSanPham.php?ID=' . $row["ID"] . '&TenSanPham=' . $row["TenSanPham"] . '&SoLuong=' . $row["SoLuong"] . '&Gia=' . $row["Gia"] . '&IDDanhMuc=' . $row["IDDanhMuc"] . '">Sửa</a></td>
              <td><a href="Delete.php?ID=' . $row["ID"] . '">Xóa</a></td>
          </tr>';
        }




        ?>

    <tbody>

</table>
<form action="create.php" method="post">
    <H1> Them Danh Sach San Pham</H1>
    <div>
        <label>ID </label><br>
        <input type="text" name="ID"><br>
        <label>Tên San Pham:</label><br>
        <input type="text" name="TenSanPham"><br>
        <label>Số lượng: </label><br>
        <input type="number" name="SoLuong"><br>
        <label>Giá:</label><br>
        <input type="number" name="Gia"><br>
        <label>IDDanhMuc:</label><br>
        <select name="IDDanhMuc" id="">
            <?php
            $servername = "localhost";
            $username = "root";
            $pass = "";
            $database = "banhang1";
            $con = mysqli_connect($servername, $username, $pass, $database);
            $sql = "SELECT *From danhmuc";
            $result1 = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result1)) {
                echo '<option value="' . $row['IDDM'] . '"';
                'selected';
                echo '>' . $row['TenDanhMuc'] . '</option>';
            }
            ?>
        </select></br>
        <input type="submit" value="ThemDanhMuc">
    </div>
</form>
</body>

</html>