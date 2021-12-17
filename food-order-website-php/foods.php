
    <?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
            <div class="cart">
                <a href ="<?php echo SITEURL; ?>cart.php"> <i class="fas fa-shopping-cart icon-cart" style="font-size:24px"></i>
                <?php
                        $username = $_SESSION['username']; 
                         $sql_cart = "SELECT * FROM tbl_bill WHERE username = '$username'";
                        $res = mysqli_query($conn, $sql_cart);
                        if (mysqli_num_rows($res)  > 0){
                            $num = 0;
                            while ($row = mysqli_fetch_assoc($res)){
                                $num += $row['quantity'];
                            }
                            $_SESSION['cart'] = $num;
                        }
                            
                            if ($_SESSION['cart'] > 0) {
                                ?>
                                <span class='badge badge-warning' id='lblCartCount'>
                            <?php
                                echo $_SESSION['cart'];
                        }
                        ?></a>
            </div>
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 
            //Display Foods that are Active
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the foods are availalable or not
            if($count>0)
            {
                //Foods Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                //CHeck whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <div class="image-wrap">
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    </div>
                                   <?php
                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            <a href="<?php echo SITEURL; ?>addtocart.php?food_id=<?php echo $id; ?>" class="btn btn-primary-add">Add to cart</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food not Available
                echo "<div class='error'>Food not found.</div>";
            }
        ?>

        

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>