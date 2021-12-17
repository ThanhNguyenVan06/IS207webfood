<?php
    include 'config/constants.php';
    $fullnameerr = $usernameerr = $phone_numbererr = $addresserr = $passworderr = $password_confirmationerr = "";
    $fullname = $username = $phone_number = $address = $password = $password_confirmation = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST['fullname'])){
          $fullnameerr = "Full name is required.";
        }
        else {
          $fullnameerr = "";
          $fullname = $_POST['fullname'];
        }
        if (empty($_POST['username'])){
          $usernameerr = "User name is required.";
          
        }
        else {
          $username_temp = $_POST['username'];
          $sql = "SELECT * FROM tbl_user WHERE csusername = '$username_temp'";
          $res = mysqli_query($conn,$sql);
          if (mysqli_num_rows($res) > 0){
            $usernameerr = "Username already exists.";
          }
          else{
            $username = $_POST['username'];
            $usernameerr = "";
          }
        }
        if (empty($_POST['phone-number'])){
          $phone_numbererr = "Phone number was required.";
        }
        else {
          $phone_numbererr = "";
          $phone = $_POST['phone-number'];
        }
        if (empty($_POST['address'])){
          $addresserr = "Address is required.";
        }
        else {
          $addresserr = "";
          $address = $_POST['address'];
        }
        if (empty($_POST['password'])){
          $passworderr = "Password is required.";
        }
        else {
          $passworderr = "";
          $password = md5($_POST['password']);
        }
        if (empty($_POST['password_confirmation'])){
          $password_confirmationerr = "Confirm password is required.";
        }
        else if($_POST['password_confirmation'] != $_POST['password']){
          $password_confirmationerr = "Password does not match.";
        }
        else {
          $password_confirmationerr = "";
          $password_confirmation = md5($_POST['password_confirmation']);
        }
        
        if ($fullname != "" && $username != "" && $phone != "" && $address != "" && $password != "" && ($password_confirmation == $password)){
          $sql = "INSERT INTO tbl_user (full_name,csusername,password,phone,address,rebuy) value ('$fullname','$username','$password','$phone','$address','0')";
          $res = mysqli_query($conn,$sql);
          if ($res == TRUE){
            header('location:'.SITEURL.'login.php');
          }
        }
      }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register_style.css">
</head>
<body>
    <div class="main">

        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Register Now</h3>
          <p class="desc"></p>
      
          <div class="spacer"></div>
          <div class="form-group">
            <label for="fullname" class="form-label">Full Name</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Jonny Dang"  class="form-control">   
            <span class="form-message"><?php echo $fullnameerr ?></span>       
          </div>
          <div class="form-group">
            <label for="username" class="form-label">User Name</label>
            <input id="username" name="username" type="text"  placeholder="VD: web" class="form-control">
            <span class="form-message"><?php echo $usernameerr ?></span>       
          </div>
          <div class="form-group">
            <label for="phone-number" class="form-label">Phone Number</label>
            <input id="phone-number" name="phone-number"  type="text" placeholder="VD: 1900XXXX" class="form-control">
            <span class="form-message"><?php echo $phone_numbererr ?></span>       
          </div>
          <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" name="password" type="password"  placeholder="Enter your password" class="form-control">
            <span class="form-message"><?php echo $passworderr ?></span>       
          </div>
      
          <div class="form-group">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input id="password_confirmation" name="password_confirmation"  placeholder="Confirm password" type="password" class="form-control">
            <span class="form-message"><?php echo $password_confirmationerr ?></span>   
          </div>
          <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input id="address" name="address" type="text"  placeholder="VD: 123 Hai Ba Trung" class="form-control">
            <span class="form-message"><?php echo $addresserr ?></span>  
          </div>
          <input type='submit' class="form-submit" value="Sign Up">
        
        </form>
    </body>
</html>
