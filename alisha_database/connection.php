<?php
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', 'jOsuel2!');
    DEFINE ('DB_NAME', 'alisha');

    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MYSQL: ' . mysqli_connect_error());

?>