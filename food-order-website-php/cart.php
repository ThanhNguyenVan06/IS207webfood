<?php include('partials-front/menu.php'); 
    $temp1 = 0;
    $temp2 = 0;
    $total = 0;
    $array = array();
    $username = $_SESSION['username'];
    
    $sql = "SELECT * FROM tbl_bill WHERE username = '$username'";
    $res = mysqli_query($conn,$sql);
    
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/cart.css">
    </head>
    
    <body class="gray">
    <?php
             $sql = "SELECT * FROM tbl_bill WHERE username = '$username'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if ($count > 0){
        ?>

    <div class="cart-page">
    <div class="grid">
        <div class="roww"> 
            <div class="l-9">
    
    <table id="customers">
    <colgroup>
       <col span="1" style="width: 30%;align-item:center">
       <col span="1" style="width: 20%;align-item:center">
       <col span="1" style="width: 20%;align-item:center">
       <col span="1" style="width: 20%;align-item:center">
    </colgroup>
    
        <tr>
            <th>Name</th>
            <th>Quanty</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    <?php
            while ($row = mysqli_fetch_assoc($res)){
                $foodname = $row['foodname'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $id = $row['id'];
                $temp2 += 1;
                $arr[$temp2] = $id;
                if ($quantity == 0){
                    $sql = "DELETE From tbl_bill where id = '$id'";
                    $res = mysqli_query($conn,$sql);
                    ?>
                    <meta http-equiv="refresh" content="0;url=cart.php">
                    <?php
                }
    ?>
    <form action="" method="POST" class="text-center">
                <tr>
                <td> <p><?php echo $foodname; ?></p></td>
                <td><input class="qty-input" type="number" id="quantity" name="<?php echo "quantity".$id?>" value= "<?php echo $quantity?>"min="0"></td>
                <td><?php
                    $total += $price*$quantity;
                    $temp1 = $price*$quantity;
                    echo $temp1; 
                    ?>$</td>
                <td>            <input type="submit" class="change-btn btn-primary" name="Change" value="Confirm">
                </td>
            </tr>
           
    </form>
            <?php
            
            if(isset($_POST["quantity". $id])) 
            
            {   
                if ($_POST["quantity".$id] != $quantity){
                    $quantity = $_POST["quantity".$id];
                    $sql = "UPDATE tbl_bill set quantity='$quantity' where id = '$id'";
                    $res = mysqli_query($conn,$sql);
                    ?>
                    <meta http-equiv="refresh" content="0;url=cart.php">
                    <?php
                }
            }
        }
            
            ?>
    </table>
    </div>
    
    <div class="l-3">
            <div class="confirm-form">

           
       
            
           
            
            <form action="" method="post" >
                <div class="formcontain">
                     <label class="label-cart" for="fullname">Name : </label> <input type="text" name="fullname" id="" value= "<?php echo $_SESSION['receiver']?>">

                </div>
                <div class="formcontain">
                    <div class="label-cart" > Phone : </div><input type="text" name="phone" id="" value= "<?php echo $_SESSION['phoneship']?>">

                </div>
                <div class="formcontain">
                <div class="label-cart" for="address">Address : </div> 
                <input type="text" name="address" id="" value = "<?php echo $_SESSION['addressship']?>">
                </div>
                <input class="comfirm-btn btn-primary" type="submit" name="Confirm" value="Confirm" >
            </form>
            
            <div class="total-price">
                        <div class="total-price-text">Total</div> 
                        <div class="total-price-value"><?PHP echo $total;
                        $_SESSION['totalprice'] = $total;
                        ?>$</div>
            

               </div>
            <a href='handle-bill.php' class="order-btn btn-primary">Order</a>
            <?php
                
                if (isset($_POST['Confirm'])){
                    $_SESSION['receiver'] = $_POST['fullname'];
                    $_SESSION['phoneship'] = $_POST['phone'];
                    $_SESSION['addressship'] = $_POST['address'];
                    ?>
                    <meta http-equiv="refresh" content="0;url=cart.php">
                    <?php
                }
            ?>
        
        </div>
    </div>
    </div>
    </div>
    <?php
            }
            else{
                $_SESSION['cart'] = 0;
        ?>
            <img style="width : 100%" src="https://proteins.live/assets/images/empty-cart.jpg" alt="">
        <?php
            }
        ?>
    </body>
    
</html>
<?php include('partials-front/footer.php'); ?>