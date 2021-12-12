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
    <div>HAHA</div>
    <body>
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
            Tên món: 
            <p><?php echo $foodname; ?></p>
            Số lượng: 
            <input type="number" id="quantity" name="<?php echo "quantity".$id?>" value= "<?php echo $quantity?>"min="0"><br><br>
            Tổng giá:<p><?php
            $total += $price*$quantity;
            $temp1 = $price*$quantity;
            echo $temp1; 
            ?>$</p><br><br>
            <br><br>
            <input type="submit" name="Change" value="Change" class="btn-primary">
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
        <?php
            $sql = "SELECT * FROM tbl_bill";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if ($count > 0){
        ?>
            <h1>Total <?PHP echo $total;
            $_SESSION['totalprice'] = $total;
            ?>$</h1>
           
            <a href='handle-bill.php'>Order</a>
            <form action="" method="post">
                Receiver:<input type="text" name="fullname" id="" value= "<?php echo $_SESSION['receiver']?>">
                Phone:<input type="text" name="phone" id="" value= "<?php echo $_SESSION['phoneship']?>">
                Address:<input type="text" name="address" id="" value = "<?php echo $_SESSION['addressship']?>">
                <input type="submit" name="Confirm" value="Confirm" class="btn-primary">
            </form>
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
        <?php
            }
            else{
                $_SESSION['cart'] = 0;
        ?>
            <h1>No product in the cart.</h1>
        <?php
            }
        ?>
    </body>
</html>
