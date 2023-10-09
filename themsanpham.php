<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <title>Document</title>
   

</head>
<body>
<?php include('menu.php'); ?>

<form action="create.php" method="post"  enctype="multipart/form-data">
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
        <label>Ảnh</label><br>
        <input type="file" name="Image" id="Image"><br>
        <label>Mô tả</label><br>

    <textarea id="editor" name="mota">
        <p>Mo Ta san Pham</p>
    </textarea>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

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