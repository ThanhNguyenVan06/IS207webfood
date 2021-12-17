<?php
$fullname = "Thanh";
$username = "User1";
$sql = "INSERT INTO tbl_user (full_name,csusername,password,phone,address) value ('$fullname','$username','$password,'$phone','$address')";
$res = mysqli_query($conn,$sql);

?>