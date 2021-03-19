<!DOCTYPE html>
<html>
    <head>
    <title>Add Material</title>
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
            }
            if(empty($data_missing)){
                require_once('connection.php');
                $query = "INSERT INTO material (Name, Description) VALUES (?,?)";
                $stmt = mysqli_prepare($dbc,$query);
                mysqli_stmt_bind_param($stmt, "ss", $name, $description);
                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);
                if($affected_rows == 1){
                    echo 'Material Entered';
                    mysqli_stmt_close($stmt);
                    mysqli_close($dbc);
                }
                else{
                    echo "You need to enter the following data <br>";
                    foreach($data_missing as $missing){
                        echo $missing. "<br>";
                    }
                }
            }
        ?>
        <?php require_once "material_form.php" ?>
    </body>
</html>