<?php include('partials-front/menu.php'); ?>
<form action="" method="post">
    <div>
    <input type="text" name="feedback" id="">
    </div>
    <div>
        <input type="submit" value="SENT" name="submit">
    </div>
</form>
<?php
    if(isset($_POST['submit'])){
        $feedback = $_POST['feedback'];
        $sql = "INSERT INTO tbl_feedback (feedback) VALUES ('$feedback')";
        $res = mysqli_query($conn,$sql);
    }
?>