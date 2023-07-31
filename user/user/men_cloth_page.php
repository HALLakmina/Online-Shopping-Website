<?php include('./component/navigation_bar.php') ?>
<main>
    <?php
        $query01= "select* from selling_product where category_id = 01";
        $result01 = mysqli_query($DB_CON,$query01);
        if(mysqli_num_rows ($result01)>0)
        {
            $query02= "select* from brand order by brand_id asc";
            $result02 = mysqli_query($DB_CON,$query02);
            while($row = mysqli_fetch_array($result02))
            {?>

                <img src="../brand_image/<?php echo $row["image"];?>" width="190px" height="100px">
                <?php
                $query03= "select* from selling_product where brand_id = $row[brand_id] order by product_id asc";
                $result03 = mysqli_query($DB_CON,$query03);

                if(mysqli_num_rows($result03)>0)
                {?>
                    <div class="row05">
                    <?php
                    while($row01 = mysqli_fetch_array($result03)){
                        ?>
                            <form method="post" action="cart_item_connect.php" >
                                <div class="column08">
                                    <img src="../selling_product_image/<?php echo $row01["image"];?>" width="170px" height="200px">
                                    <h5><?php echo $row01["product_name"];?></h5>
                                    <h5><?php echo $row01["prodct_price"];?></h5>
                                    <input type="hidden" name="image" value="<?php echo $row01["image"];?>">
                                    <input type="hidden" name="product_name" value="<?php echo $row01["product_name"];?>">
                                    <input type="hidden" name="price" value="<?php echo $row01["prodct_price"];?>">
                                    <input type="number" name="quantity" value="1">
                                    <input type="hidden" name="page_name" value="UserMenTrousersPage"><br>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                    <center><input type="submit" name="add" value="add to cart"></center>
                                    
                                </div>
                            </form>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                }
                
            }
        }
    ?>
</main>
<?php include('./component/footer_bar.php') ?>