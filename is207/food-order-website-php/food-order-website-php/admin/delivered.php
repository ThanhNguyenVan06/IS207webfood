<?php
     include('partials/menu.php');
     $id = $_GET['id'];
     $sql = "UPDATE tbl_ship set Status = 'Delivered' where id = '$id'";
     $res = mysqli_query($conn, $sql);
     $sql = "select * FROM tbl_ship where id = '$id'";
     $res = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($res); 
     $username = $row['username'];
     $date = date("Y-m-d h:i:sa");
     $notify = "Your order has been delivered successfully";
     $sql = "INSERT INTO adtouser (username,notify,date) values ('$username','$notify','$date')";
     $res = mysqli_query($conn, $sql);
     header('location:'.SITEURL.'admin/bill-admin.php');
?>