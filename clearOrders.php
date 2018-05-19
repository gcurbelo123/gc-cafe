<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

//Checking credentials in database
$sql = "TRUNCATE TABLE orders";
$stmt = $connect->prepare($sql);
$stmt->execute($data);

header('Location: admin.php');

?>