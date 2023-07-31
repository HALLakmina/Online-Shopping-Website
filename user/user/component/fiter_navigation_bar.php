<select>
    <option >--all--</option>
    <?php
        include("../backend/DBConnection.php");
        $filterQuery = "SELECT * FROM category where type='men_name'";
        $filterResult = mysqli_query($DB_CON,$filterQuery);
        while($row= mysqli_fetch_array($filterResult))
        {
            ?>
                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['provinceName']; ?></option>
            <?php
        }
    ?>
</select>