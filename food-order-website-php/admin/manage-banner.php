<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /><br />
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>

        <!-- Button to Add Admin -->
        <a href="<?php echo SITEURL; ?>admin/add-banner.php" class="btn-primary">Add Banner</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

            <?php

            //Query to Get all CAtegories from Database
            $sql = "SELECT * FROM tbl_banner";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Create Serial Number Variable and assign value as 1
            $sn = 1;

            //Check whether we have data in database or not
            if ($count > 0) {
                //We have data in database
                //get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $title; ?></td>

                        <td>

                            <?php
                            //Chcek whether image name is available or not
                            if ($image_name != "") {
                                //Display the Image
                            ?>

                                <img src="<?php echo SITEURL; ?>images/banner/<?php echo $image_name; ?>" width="100px">

                            <?php
                            } else {
                                //DIsplay the MEssage
                                echo "<div class='error'>Image not Added.</div>";
                            }
                            ?>

                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/delete-banner.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Banner</a>
                        </td>
                    </tr>

                <?php

                }
            } else {
                //WE do not have data
                //We'll display the message inside table
                ?>

                <tr>
                    <td colspan="6">
                        <div class="error">No Banner Added.</div>
                    </td>
                </tr>

            <?php
            }

            ?>




        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>
