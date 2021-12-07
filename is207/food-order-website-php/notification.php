<?php
    include('partials-front/menu.php'); 
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM adtouser where username = '$username'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0){
?>
<body>
        <table> 
        <tr>
            <td>S.N.</td>
            <td>Date</td>
            <td>Notification</td>
            <td>Actions</td>
        </tr>
<?php
    $sn = 1;
    while ($row = mysqli_fetch_assoc($res)){
        $date = $row['date'];
        $notify = $row['notify'];
        $id = $row['id'];
        if ($notify == "Your order has been delivered successfully"){
?>      
        <tr>
            <td><?php echo $sn++; ?>. </td>
            <td><?php echo $date; ?></td>
            <td><?php echo $notify; ?></td>
            <td>
                <a href="<?php echo SITEURL; ?>delete-notify.php?id=<?php echo $id; ?>" class="btn-primary">Delete</a>
                <a href="<?php echo SITEURL; ?>feedback.php?id=<?php echo $id; ?>" class="btn-primary">Feedback</a>
            </td>
        </tr>
        <?php
        }
        else{
        ?>
        <td><?php echo $sn++; ?>. </td>
        <td><?php echo $date; ?></td>
        <td><?php echo $notify; ?></td>
        <?php
        }
        ?>
        
<?php
    }
?>  
        </table>
<?php
    }
    else {
?>  
 <h1>No notification</h1>
<?php
  }
?>
</body>
 <?php include('partials-front/footer.php'); ?>