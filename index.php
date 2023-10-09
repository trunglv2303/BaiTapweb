<?php
session_start();
?>
<html>
<head>
<title>Demo Shopping Cart - Created By My Kenny</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Demo Shopping Cart</h1>
<div id='cart'>
<?php
$ok=1;
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $k=>$v)
{
if(isset($v))
{
$ok=2;
}
}
}
if ($ok != 2)
{
echo '<p>Ban khong co mon hang nao trong gio hang</p>';
}
else
{
$items = $_SESSION['cart'];
echo '<p>Ban dang co <a href="cart.php">'.count($items).' mon hang trong
gio hang</a></p>';
}
?>
<?php
$servername = "localhost";
$username = "root";
$pass = "";
$database = "banhang1";
$con = mysqli_connect($servername, $username, $pass, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM sanpham ORDER BY id DESC";
$result1 = mysqli_query($con, $sql);

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_array($result1)) {
        echo "<div class='pro' style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
        echo "<h3 style='color: #333;'>{$row['TenSanPham']}</h3>";
        echo "<img style='width: 7%; max-width: 150px;' src='uploads/{$row['Image']}' > <br> Gia: " . number_format($row['Gia'], 3) . " VND<br />";
        echo "<p align='right'><a href='addcart.php?item={$row['ID']}' style='background-color: #007bff; color: #fff; padding: 5px 10px; text-decoration: none;'>Mua Sản phẩm</a></p>";
        echo "<hr>";
        echo "</div>";
        
    }
} else {
    echo "No products found.";
}

mysqli_close($con);
?>

</body>
</html>


