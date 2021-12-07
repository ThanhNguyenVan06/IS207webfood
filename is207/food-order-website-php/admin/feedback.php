<?php 
    include('partials/menu.php');
    $sql = "SELECT * FROM tbl_feedback";
    $res = mysqli_query($conn, $sql);
    $sn = 1;
    if (mysqli_num_rows($res) > 0){
?>
<h1>
Customer's feedback
</h1>
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Feedback</th>
        <th>Action</th>
    </tr>
<?php
    while ($rows = mysqli_fetch_assoc($res)){
        $feedback = $rows['feedback'];
        $id = $rows['id'];
        ?>
            <tr>
                <td><?php echo $sn++; ?>. </td>
                <td><?php echo $feedback; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/delete-feedback.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>
                </td>
            </tr>
        <?php
    }
?>
 </table>
 <?php
    }
    else {
?>
<h1> No feedback </h1>
  <?php
    }
?>
<?php include('partials/footer.php'); ?> 