<?php
    include('config/constants.php');
    $_SESSION['cart'] = 0;
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM tbl_user WHERE csusername = '$username'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $rebuy = $row['rebuy'] + 1;
    
    $fullnameship = $_SESSION['receiver'];
    $phoneship = $_SESSION['phoneship'];
    $addressship = $_SESSION['addressship'];

    echo $_SESSION['receiver'];
    $total = $_SESSION['totalprice'];
    $sql = "INSERT INTO tbl_ship (fullname,phone,address,username,rebuy,totalprice,Status) VALUES ('$fullnameship', '$phoneship','$addressship','$username','$rebuy','$total','Ordered')";
    $resship = mysqli_query($conn,$sql);

    $_SESSION['totalprice'] = 0;
    $sql = "SELECT * FROM tbl_bill";
    $res = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($res)){
        $id = $row['id'];
        $username = $row['username'];
        $foodname = $row['foodname'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $sql = "INSERT INTO tbl_bill_ad (username,foodname,quantity,price,rebuy) VALUES ('$username','$foodname','$quantity','$price','$rebuy')";
        $res2 = mysqli_query($conn,$sql);
    }
    
    $sql = "DELETE from tbl_bill WHERE username = '$username'";
    $res = mysqli_query($conn,$sql);
    $sql = "UPDATE  tbl_user set rebuy = '$rebuy' where csusername = '$username'";
    $res = mysqli_query($conn,$sql);
    if ($res == TRUE){
        $date = date("Y-m-d h:i:sa");
        $notify = "Your order has been placed. Wait for minute, the staff will call you back";
        $sql = "INSERT INTO adtouser (username,notify,date) values ('$username','$notify','$date')";
        $res = mysqli_query($conn, $sql);
        header("Location:".SITEURL."index.php");
    }
?>