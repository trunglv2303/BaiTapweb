<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('menu.php'); ?>

<form action="createdanhmuc.php" method="post">
    <H1> Them Danh Muc San Pham</H1>
    <div>
        <label>ID</label><br>
        <input type="text" name="IDDM"><br>
        <label>Tên San Pham:</label><br>
        <input type="text" name="TenDanhMuc"><br>
        <input type="submit" value="ThemDanhMuc">
    </div>
</form>
</body>
</html>