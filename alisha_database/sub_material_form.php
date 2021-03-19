
<form id = "sub_material_form" class = "form1" action = "added_sub_material.php" method = "post" autocomplete = "off">
            <h2>Add a New Purchase</h2>
            <p>Item Name:
                <input type = "text" name = "name" size = "50" required>
            </p>
            <p>
                Description: <br>
                <textarea form = "sub_material_form" name = "description" required></textarea>
            </p>
            <p>Price:
                <input type = "number" name = "price" required min = 0 required step = "0.01">
            </p>     
            <p>Quantity:
                <input type = "number" name = "quantity" required min = 1 required>
            </p>
            <p>Material Type:
                <?php require_once "connection.php"; ?>
                <?php $sql = "SELECT * FROM material";?>
                <?php if($result=mysqli_query($dbc,$sql)): ?>
                    <select name = "materialtype">
                    <?php while($row = mysqli_fetch_assoc($result)):?>
                     
                        <option value = "<?= $row['MID']?>" > <?= $row['Name'] ?> </option>
                    <?php endwhile; ?>
                    </select>
                <?php else:?>
                    <p>
                        Couldn't execute query to get Material Types.
                    </p>

                <?php endif;?>
            </p>
            <p>
                <input type = "submit" name = "submit" value = "Enter" required>
            </p>
</form>