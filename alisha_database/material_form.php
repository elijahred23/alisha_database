
        <form  id = "material_form" class = "form1" action = "added_material.php" method = "post" autocomplete = "off">
            <h2>Add a New Material Type</h2>
            <p>Material Name:
                <input type = "text" name = "name" size = "50" required>
            </p>
            <p>
                Description: <br>
                <textarea form = "material_form" name = "description" required></textarea>
            </p>
            <p>
                <input type = "submit" name = "submit" value = "Enter" required>
            </p>
        </form>