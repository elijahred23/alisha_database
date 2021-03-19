<!DOCTYPE html>
<html>
    <head>
    <title>Addded Sub Material</title>
    <link href = "index.css" rel = "stylesheet" type = "text/css">
    </head>
    <body>
        <?php
            require_once "nav.php";  
            if(isset($_POST['submit'])){
                $data_missing = array();
                if(empty($_POST['name'])){
                    $data_missing[] = 'Name';
                }
                else{
                    $name = trim($_POST['name']);
                }
                if(empty($_POST['description'])){
                    $data_missing[] = 'Description';
                }
                else{
                    $description = trim($_POST['description']);
                }
                if(empty($_POST['price'])){
                    $data_missing[] = 'Price';
                }
                else{
                    $price = trim($_POST['price']);
                }
                if(empty($_POST['quantity'])){
                    $data_missing[] = 'Quantity';
                }
                else{
                    $quantity = trim($_POST['quantity']);
                }
                if(empty($_POST['materialtype'])){
                    $data_missing[] = 'Material Type';
                }
                else{
                    $material_type = trim($_POST['materialtype']);
                }
            }
            if(empty($data_missing)){
                require_once('connection.php');
                $query = "INSERT INTO sub_material (Name, Description, Price, Quantity, MID) VALUES (?,?,?,?,?)";
                $stmt = mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt, "ssdii", $name, $description, $price, $quantity, $material_type);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);
                if($affected_rows == 1){
                    echo '<h1>Material Entered</h1>';
                    mysqli_stmt_close($stmt);
                    mysqli_close($dbc);
                }
                else{
                    echo "<h1>You need to enter the following data <br>";
                    foreach($data_missing as $missing){
                        echo $missing. "<br>";
                    }
                    echo "</h1>";
                }
            }
        ?>
        <?php require_once "sub_material_form.php" ?>
    </body>
</html>