<!DOCTYPE html>
<html>
<head>
    <title>Material Info</title>
    <link href = "index.css" rel = "stylesheet" type = "text/css">
</head>
<body>
    <?php
        require_once('connection.php');
            require_once "nav.php"; 
        $query = "SELECT concat(material.Name) AS Material_Type, material.Description, round(sum(Price * Quantity * 1.09), 2) as Total_Cost  from sub_material
        inner join material on material.MID = sub_material.MID
        group by sub_material.MID;";
        $response = mysqli_query($dbc, $query);

    ?>
    <?php if($response): ?>
        <h2 style= "font-size: 5em;">Material Type Info</h2>
        <table >
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>Total Spent</td>
            </tr>
            <?php while($row = mysqli_fetch_assoc($response)): ?>
                <tr>
                    <td><?= $row['Material_Type']?></td>
                    <td><?= $row['Description']?></td>
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