<?php 
include('partials-front/menu.php'); 
?>
    <div class="main">

        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Account Information</h3>
          <p class="desc"></p>
      
          <div class="spacer"></div>
          <div class="form-group">
            <label for="fullname" class="form-label">Full Name</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Jonny Dang"  value = "<?php echo $_SESSION["full_name"] ;?>" class="form-control">         
          </div>
          <div class="form-group">
            <label for="username" class="form-label">User Name</label>
            <input id="username" name="username" type="text"  placeholder="VD: web" value = "<?php echo $_SESSION["username"] ;?>" class="form-control">      
          </div>
          <div class="form-group">
            <label for="phone-number" class="form-label">Phone Number</label>
            <input id="phone-number" name="phone-number"  type="text" placeholder="VD: 1900XXXX" value = "<?php echo $_SESSION['phone'] ;?>" class="form-control">    
          </div>
          <div class="form-group">
            <label for="password" class="form-label">Current Password</label>
            <input id="password" name="currentpassword" type="password"  placeholder="Enter your password" class="form-control">
          </div>
          <div class="form-group">
            <label for="newpassword" class="form-label">New Password</label>
            <input id="newpassword" name="newpassword" type="password"  placeholder="Enter your password"  class="form-control">
          </div>
      
          <div class="form-group">
            <label for="password_confirmation" class="form-label">Password Confirmation</label>
            <input id="password_confirmation" name="password_confirmation"  placeholder="Confirm password" type="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="address" class="form-label">Address</label>
            <input id="address" name="address" type="text"  placeholder="VD: 123 Hai Ba Trung" value = "<?php echo $_SESSION["address"] ;?>" class="form-control">  
          </div>
          <input type='submit' name = 'submit' class="form-submit" value="Change">
        
        </form>
    </div>
<?php
    
    if (isset($_POST['submit'])){
        if (md5($_POST['currentpassword']) == $_SESSION['currentpassword']){
            $res = "";
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $phone = $_POST['phone-number'];
            $address = $_POST['address'];
            $newpassword = $_POST['newpassword'];
            $newpassword = trim($newpassword);
            $currentpassword = $_SESSION['currentpassword'];
            $repeat_password = $_POST['password_confirmation'];
            $id = $_SESSION['id'];
            if (md5($_POST['currentpassword']) == $currentpassword){
                $sql = "UPDATE tbl_user set full_name = '$fullname',csusername = '$username',phone = '$phone',address = '$address' where id = '$id'";
                if ($newpassword != "" && ($newpassword == $repeat_password)){
                    $newpassword = md5($newpassword);
                    $sql = "UPDATE tbl_user set full_name = '$fullname',csusername = '$username',phone = '$phone',address = '$address', password = '$newpassword' where id = '$id'";
                }
                $res = mysqli_query($conn, $sql);
            }
            if($res == TRUE){
                $sql = "SELECT* from tbl_user WHERE csusername = '$username'";
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
                    }
                    $_SESSION['username'] = $username;
                    ?>
                    <meta http-equiv="refresh" content="0;url=index.php">
                    <?php
                }
                
            }
        }
    }
?>