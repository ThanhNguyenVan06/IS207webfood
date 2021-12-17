<?php
     include('partials/menu.php');
    $id = $_GET["id"];
    $sql = "DELETE FROM tbl_feedback where id = '$id'";
    $res = mysqli_query($conn, $sql);
    header('location:'.SITEURL.'admin/feedback.php');
?>