<?php include('partials-front/menu.php'); ?>
<html>
    <head>
        <link rel="stylesheet" href="./css/giveFeedback.css">
        <link rel="stylesheet" href="./css/grid.css">
    </head>
    <body class="gray">

<form class="sent-fbk-form" action="" method="post">
    

 
        <div class="sent-fbk-form-header">
        Your Feedback
        </div>
        <div class="sent-fbk-form-text-contain">
        <div class="sent-fbk-form-text">
        Thank you for choosing our products
        </div>
        <div class="sent-fbk-form-text">
        
We would love to hear your feedback on the quality of our products and services so that we can continue to improve         </div>
        </div>
        <div>
   
    <textarea class="fbk-text" name="feedback" cols="40" rows="5"></textarea>
    </div>
    <div>
        <input class="fbk-sent-btn btn-primary" type="submit" value="SENT" name="submit">
    </div>
</form>
<?php
    if(isset($_POST['submit'])){
        $feedback = $_POST['feedback'];
        $sql = "INSERT INTO tbl_feedback (feedback) VALUES ('$feedback')";
        $res = mysqli_query($conn,$sql);
    }
?>
    </body>
</html>
<?php include('partials-front/footer.php'); ?>