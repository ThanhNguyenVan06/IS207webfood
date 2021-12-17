<?php
include('partials-front/menu.php');
$id = $_GET['id'];
$sql = "DELETE From adtouser where id = '$id'";
$res = mysqli_query($conn, $sql);
header('location:'.SITEURL.'notification.php');
?>