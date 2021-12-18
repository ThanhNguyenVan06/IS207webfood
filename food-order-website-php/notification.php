<?php
    include('partials-front/menu.php'); 
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM adtouser where username = '$username'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0){
?>

<head>
        <link rel="stylesheet" href="./css/notification.css">
</head>
<body>
    <section class="ftco-section">
        <div class="notif-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped"> 
                            <tr>
                                <th>S.N.</th>
                                <th>Date</th>
                                <th>Notification</th>
                                <th>Actions</th>
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
                                    <a href="<?php echo SITEURL; ?>delete-notify.php?id=<?php echo $id; ?>" class="btn-danger btn">Delete</a>
                                    <a href="<?php echo SITEURL; ?>feedback.php?id=<?php echo $id; ?>" class="btn-success btn">Feedback</a>
                                </td>
                            </tr>
                            <?php
                            }
                            else{
                            ?>
                            </tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $notify; ?></td>
                            </tr>
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
                     <div class="row">
                         <div class="col-md-12">
                     <img style="width :100%; height: 700px" src="https://assets.materialup.com/uploads/c55f144e-6102-48e7-8983-d585876c3a29/preview.jpg" alt="">
                    </div>
                    </div>
                    <?php
                      }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
</body>
 <?php include('partials-front/footer.php'); ?>