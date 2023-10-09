
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Danh Mục Sản Phẩm</title>
</head>
<?php include('menu.php'); ?>

<table class="table">
<thead>
      <tr>
        <th>ID</th>
        <th>Tên Danh Mục</th>
        <th>Sửa</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>

    <?php 

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);

    $sql = "SELECT * FROM danhmuc ";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo   '<tr>
                   <td> ' . $row["IDDM"] . '</td>
                   <td> <a href="DanhSachSanPham.php?IDDM=' . $row["IDDM"] . '">' . $row["TenDanhMuc"] . '</a> </td>
                   <td><a href="SuaDanhMuc.php?IDDM=' . $row["IDDM"] . '&TenDanhMuc=' . $row["TenDanhMuc"]  . '">Sửa</a></td>
                   <td><a href="Deletedanhmuc.php?IDDM=' . $row["IDDM"] . '">Xóa</a></td>
                </tr>';
    }

    ?>

    </tbody>
  </table>
  </div>
  
</body>
</html>
