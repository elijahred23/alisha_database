<!DOCTYPE html>
<html>
<head>
    <title>Sub Material Info</title>
    <link href = "index.css" rel = "stylesheet" type = "text/css">
</head>
<body>
    <?php 
        require_once('connection.php');
        require_once "nav.php"; 
        require_once "delete_form.php";
    ?>
    <?php 
        if(isset($_POST['submit'])){
            $SMID = $_POST['SMID'];
            $query1 = "DELETE FROM sub_material
            WHERE SMID = ?
            ";
            $stmt = mysqli_prepare($dbc,$query1);
            mysqli_stmt_bind_param($stmt, "i", $SMID);
            mysqli_stmt_execute($stmt);
            $affected_rows = mysqli_stmt_affected_rows($stmt);
            if($affected_rows == 1){
                echo '<h1>Purchase ID '. $SMID. ' was successfully deleted.</h1>';
                mysqli_stmt_close($stmt);
                   mysqli_close($dbc);
               }
            header("Refresh:0");
        }
    ?>      

    <?php
        $query2 = "SELECT
                    sub_material.Name,
                    sub_material.Description,
                    sub_material.SMID,
                    Price,
                    Quantity,
                    ROUND(Price * Quantity * 1.09,2) as Total_Cost,
                    CONCAT(material.Name) as Material_Type
                    from sub_material
                    inner join material
                    on material.MID = sub_material.MID
                    order by sub_material.MID
                    ";
        $response = mysqli_query($dbc, $query2);
    ?>

    <?php if($response): ?>
        <h2 style = "font-size: 5em;">Purchases</h2>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Material Type</td>
                <td>Description</td>
                <td>Retail Price</td>
                <td>Quantity</td>
                <td>Total Cost (After Taxes)</td>
            </tr>
            <?php while($row = mysqli_fetch_assoc($response)): ?>
                <tr>
                    <td><?= $row['SMID']?></td>
                    <td><?= $row['Name']?></td>
                    <td><?= $row['Material_Type']?></td>
                    <td><?= $row['Description']?></td>
                    <td>$<?= $row['Price']?></td>
                    <td><?= $row['Quantity']?></td>
                    <td>$<?= $row['Total_Cost']?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Couldn't issue database query</p>
        <p><?=mysqli_error($dbc) ?> </p>
    <?php endif;?>
    <?php mysqli_close($dbc); ?>
    

</body>

</html>