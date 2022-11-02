<?php
    $dbHost = 'localhost';
    $dbName = 'chargingpoint';
    $dbUsername = 'root';
    $dbPassword = '';
    $con = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
    if (!$con)
    {
      die( "<script>alert('Connection Failed.')</script>" );
    }
?>