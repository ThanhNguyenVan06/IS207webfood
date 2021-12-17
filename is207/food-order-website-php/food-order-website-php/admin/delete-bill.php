<?php
     include('partials/menu.php');
    $id = $_GET["id"];
    $sql = "SELECT * FROM tbl_ship where id = '$id'";
    $res = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($res);
    $username = $rows['username'];
    $rebuy = $rows['rebuy'];
    $sql = "DELETE FROM tbl_bill_ad where username = '$username' and rebuy = '$rebuy'";
    $res2 = mysqli_query($conn, $sql);
    $sql = "DELETE FROM tbl_ship where id = '$id'";
    $res2 = mysqli_query($conn, $sql);
    header('location:'.SITEURL.'admin/bill-admin.php');
?>