<?php include('partials/menu.php');?>
<h1>
    Bill
</h1>
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Food's name</th>
        <th>Quantity</th>
        <th>Total item</th>
    </tr>
    <?php  
        $id = $_GET["id"];
        $sql = "SELECT * FROM tbl_ship where id = '$id'";
        $res = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_assoc($res);
        $username = $rows['username'];
        $rebuy = $rows['rebuy'];
        $totalprice = $rows['totalprice'];

        $sql = "SELECT * FROM tbl_bill_ad where username = '$username' and rebuy = '$rebuy'";
        $res2 = mysqli_query($conn, $sql);
        $sn = 1; 
        while($row = mysqli_fetch_assoc($res2)){
            $foodname = $row['foodname'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $totalitem = $quantity*$price;
            ?>
            <tr>
                <td><?php echo $sn++; ?>. </td>
                <td><?php echo $foodname; ?></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $totalitem; ?>$</td>
            </tr>
        <?php
        }
        
    ?>
    </table>
    <h1>Total: <?php echo $totalprice?>$</h1>
<?php include('partials/footer.php'); ?> 