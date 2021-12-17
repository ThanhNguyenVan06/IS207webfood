
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./css/login_1.css">
</head>
<body>
    <div class="main">
        <div class="sign_in">
            <div class="sign_in_title">
                <h1 class="sign_in_title_text">Sign In</h1>
            </div>
            <form action="" method="POST" class="form" id="form-1">
                <div class="form_group">
                    <input id="email" name="username" type="text" placeholder="Enter your user name" class="form_control">
                    <input id="password" name="password" type="password" placeholder="Enter your password" class="form_control">
                </div>
                <div class="check_ad">
                    <input type="radio" name="acc-ad" class = "btn-check" value="Admin">
                    <p class="text-ad">Admin</p>
                    <input type="radio" name="acc-ad" class = "btn-check" value="customer">
                    <p class="text-ad">Customer</p>
                </div>
                <div class="sign_in_btn">
                    <input type="submit" class='form_submit' name="submit" value="Sign In">
                </div>
                
            </form>         
            <a href="signup.php"><p class="register_text">Sign up now</p></a>
        </div>
    </div>
</body>
</html>
<?php 
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass ="";
$dbname  = "food_order";
if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Could not connect to my database");
};
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    if($_POST['acc-ad'] == "Admin")
    {
        $sql = "SELECT* from tbl_admin WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($conn,$sql);
        if (mysqli_num_rows($res) > 0){
            $_SESSION['username'] = $username;
            header("Location:"."http://localhost/is207/food-order-website-php/"."admin/index.php"); 
        }
    }
    elseif($_POST['acc-ad'] == "customer"){
        $sql = "SELECT* from tbl_user WHERE csusername = '$username' AND password = '$password'";
        $res = mysqli_query($conn,$sql);
        if (mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                $_SESSION['full_name'] = $row['full_name'];
                $_SESSION['csusername'] = $row['csusername'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['currentpassword'] = $row['password'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['receiver'] = $row['full_name'];
                $_SESSION['phoneship'] = $row['phone'];
                $_SESSION['addressship'] = $row['address'];
                $_SESSION['cart'] = 0;
            }
            $_SESSION['username'] = $username;
            
            header("Location:"."http://localhost/is207/food-order-website-php/"."index.php"); 
        }
    }
}
?>