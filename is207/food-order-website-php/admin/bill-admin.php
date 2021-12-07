<?php 

 include('partials/menu.php');
 

?>
<h1>
    Total Bill
</h1>
<table class="tbl-full">
    <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Bill </th>
        <th>Phone</th>
        <th>Address </th>
        <th>Total </th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
<?php
    $sql = "SELECT * FROM tbl_ship";
    $res = mysqli_query($conn, $sql);
    $sn = 1;
    while ($rows = mysqli_fetch_assoc($res)){
        $id = $rows['id'];
        $fullname = $rows['fullname'];
        $phone = $rows['phone'];
        $address = $rows['address'];
        $totalprice = $rows['totalprice'];
        $status = $rows['Status'];
        ?>
            <tr>
                <td><?php echo $sn++; ?>. </td>
                <td><?php echo $fullname; ?></td>
                <td><a href="<?php echo SITEURL; ?>admin/detail-bill.php?id=<?php echo $id; ?>">Detail</a></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $totalprice; ?>$</td>
                <td><?php echo $status; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/delivering.php?id=<?php echo $id; ?>" class="btn-primary">Delivering</a>
                    <a href="<?php echo SITEURL; ?>admin/delivered.php?id=<?php echo $id; ?>" class="btn-secondary">Delivered</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-bill.php?id=<?php echo $id; ?>" class="btn-danger">Delete Bill</a>
                </td>
            </tr>
        <?php
    }
?>
 </table>
<?php include('partials/footer.php'); ?> 