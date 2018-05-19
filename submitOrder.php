<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

if(isset($_SESSION['cart'])){
    
    foreach($_SESSION['cart'] as $item){
        date_default_timezone_set("America/Los_Angeles");
        $sql = "INSERT INTO orders (orderNum, customer, item, date, time) VALUES (NULL, :customer, :item, :date, :time)";
        $stmt = $connect->prepare($sql);
        $data = array(":customer" => $_SESSION['username'],
                      ":item" => $item['item'],
                      ":date" => date("m/d/Y"),
                      ":time" => date("h:ia"));
        $stmt->execute($data);
    }
    unset($_SESSION['cart']);
    header('Location: redirect.php');

} else {
    header('Location: redirect.php');
}





?>