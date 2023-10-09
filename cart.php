<?php
session_start();
if (isset($_POST['submit'])) {
    foreach ($_POST['qty'] as $key => $value) {
        if (($value == 0) && (is_numeric($value))) {
            unset($_SESSION['cart'][$key]);
        } elseif (($value > 0) && (is_numeric($value))) {
            $_SESSION['cart'][$key] = $value;
        }
    }
    header("location: cart.php");
    exit; // Add exit to prevent further code execution after the header redirection
}
?>
<html>
<head>
    <title>Demo Shopping Cart - Created By My Kenny</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<h1>Demo Shopping Cart</h1>
<?php
$ok = 1;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        if (isset($k)) {
            $ok = 2;
        }
    }
}

if ($ok == 2) {
    echo "<form action='cart.php' method='post'>";
    foreach ($_SESSION['cart'] as $key => $value) {
        $item[] = $key;
    }
    $str = implode(",", $item);

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $database = "banhang1";
    $con = mysqli_connect($servername, $username, $pass, $database);
    $sql = "SELECT * FROM sanpham WHERE id IN ($str)";
    $result1 = mysqli_query($con, $sql);

    $total = 0; 
    while ($row = mysqli_fetch_array($result1)) {
        echo "<div class='pro'>";
        echo "<h3 >{$row['TenSanPham']}</h3>";
        echo "<img style='width: 7%; max-width: 150px;' src='uploads/{$row['Image']}' > <br> Gia: " . number_format($row['Gia'], 3) . " VND<br />";
        echo "<p align='right'>So Luong: <input type='text' name='qty[{$row['ID']}]' size='5' value='{$_SESSION['cart'][$row['ID']]}'> - ";
        echo "<a href='delcart.php?id={$row['ID']}'>Xoa Sach Nay</a></p>";
        $subtotal = $_SESSION['cart'][$row['ID']] * $row['Gia'];
        echo "<p align='right'> Gia tien cho mon hang: " . number_format($subtotal, 3) . " VND</p>";
        $total += $subtotal; 
        echo "</div>";
    }
    echo "<div class='pro' align='right'>";
    echo "<b>Tong tien cho cac mon hang: <font color='red'>" . number_format($total, 3) . " VND</font></b>";
    echo "</div>";
    echo "<input type='submit' name='submit' value='Cap Nhat Gio Hang'>";
    echo "<div class='pro' align='center'>";
    echo "<b><a href='index.php'>Mua Sach Tiep</a> - <a href='delcart.php?productid=0'>Xoa Bo Gio Hang</a></b>";
    echo "</div>";
} else {
    echo "<div class='pro'>";
    echo "<p align='center'>Ban khong co mon hang nao trong gio hang<br /><a href='index.php'>Buy Ebook</a></p>";
    echo "</div>";
}
?>
</body>
</html>
