<?php
    include('config/constants.php');
    $_SESSION['cart'] += 1;
    $food_id =  $_GET['food_id'];
    $sql = "SELECT * FROM tbl_food WHERE id = '$food_id'";
    $res = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $foodname = $row['title'];
    $username = $_SESSION['username'];
    $price = $row['price'];
    $sql = "SELECT * FROM tbl_bill WHERE username = '$username' and foodname = '$foodname'";
    $res=mysqli_query($conn,$sql);
    if ($res == TRUE){
        echo $food_id;
        echo $foodname;
        echo $username;
    }
    if (mysqli_num_rows($res) > 0){
        $row=mysqli_fetch_assoc($res);
        $quantity = $row['quantity'] + 1;
        $sql = "UPDATE tbl_bill Set quantity = '$quantity' WHERE foodname = '$foodname'";
        $res= mysqli_query($conn,$sql);
        echo $quantity;
        
    }
    else{
        $sql = "INSERT INTO tbl_bill (username,foodname,quantity,price) values ('$username','$foodname','1','$price')";
        $res= mysqli_query($conn,$sql);
        if($res == TRUE){
            echo 'lmao';
        }
        echo 'ahihi__';
    }
    header("Location:"."http://localhost/is207/food-order-website-php/"."foods.php");
?>