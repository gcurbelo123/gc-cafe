<?php
session_start();
include 'connect.php';
function checkUser(){
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    } 
}

function showOrders(){
    $db = getDBConnection();
    
    $sql = "SELECT * FROM orders";
    
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $orders = $stmt->fetchAll();
    
    echo "<table class = 'table' align = 'center'>";
    foreach($orders as $order) {
        $itemName = $order['item'];
        $customer = $order['customer'];
        $orderDate = $order['date'];
        $orderTime = $order['time'];
        
        echo "<tr>";
        echo "<td><h4>$itemName</td>";
        echo "<td><h4>ordered by";
        echo "<td><h4>$customer</h4></td>";
        echo "<td><h4>on</h4></td>";
        echo "<td><h4>$orderDate</h4></td>";
        echo "<td><h4>at</h4></td>";
        echo "<td><h4>$orderTime</h4></td>";
        
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = 'utf-8'/>
        <title> 
            Gilbert's Cafe
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Pacifico|Trocchi" rel="stylesheet">
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" />
    </head>
    <body>
        <?=checkUser()?>
        <header id = "name">
            <h1> Order History </h1>
        </header>
        <?=showOrders()?>
        <hr width = "0%"/>
        <button id = "clear">Clear All Entries</button>
        <button id = "back">Return</button>
    </body>
    
    <script type="text/javascript">
        $("#back").click(function(){
            $.ajax({
                type : "GET",
                url  : "admin.php",            
                data : {},    
                success : function(data){
                    window.location.href = "admin.php";
                },
                complete: function(data,status) { //optional, used for debugging purposes
                   //alert(status);
                }

            });
        });
        
        $("#clear").click(function(){
           window.location.href = "clearOrders.php";
        });
    </script>
    

</html>