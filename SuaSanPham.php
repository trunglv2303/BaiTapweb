
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

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
<body>
    <?php include('menu.php')
    ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);
    $id = $_GET['ID'];
    $TenSanPham = $_GET['TenSanPham'];
    $SoLuong = $_GET['SoLuong'];
    $Gia = $_GET['Gia'];
    $Image = $_GET['Image'];
    $Mota = $_GET['mota'];
    $IDDanhMuc = $_GET['IDDanhMuc'];
    //  $con = mysqli_connect($servername, $username, $pass, $database);
    ?>
    <form action="update.php" method="post">
        <h4>Sửa Sản Phẩm</h4>
        <div>
            <label>ID </label><br>
            <input type="text" name="ID" value="<?php echo  $id ?>"><br>
            <label>Tên San Pham:</label><br>
            <input type="text" name="TenSanPham" value="<?php echo  $TenSanPham ?>"><br>
            <label>Số lượng: </label><br>
            <input type="number" name="SoLuong" value="<?php echo  $SoLuong ?>"><br>
            <label>Giá:</label><br>
            <input type="number" name="Gia" value="<?php echo  $Gia ?>"><br>
            <label for="">Ảnh</label>
            <input type="file" name="Image" value="<?php echo    $Image ?>"><br>
            <textarea id="editor" name="mota" >
            <?php echo    $Mota ?>
    </textarea>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
            <input type="number" name="Gia" value="<?php echo     $Mota ?>"><br>
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

                    if ($IDDanhMuc == $row['IDDM']) echo 'selected';
                    echo '>' . $row['TenDanhMuc'] . '</option>';
                }

                ?>
            </select></br>
            <input type="submit" value="Update">
        </div>
    </form>
</body>

</html>