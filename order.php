<?php
session_start();

function displayOrder(){
    //displays Quiz if session is active
    if(isset($_SESSION['username'])){
        include 'order.php';
    } else {
        header("Location: login.php");
    }
}

function displayCart() {
    if(isset($_SESSION['cart'])) {
        echo "<table class = 'table' align = 'center'>";
        foreach ($_SESSION['cart'] as $item){
            $customer = $item['customer'];
            $itemName = $item['item'];
            $orderDate = $item['date'];
            $orderTime = $item['time'];
            
            echo "<tr>";
            echo "<td align = 'center' valign = 'middle' id = 'item'>$itemName</td>";
            
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'itemName' value = '$itemName'>";
            echo "<input type = 'hidden' name = 'remove' value = 'remove'>";
            echo "<td> <button id = 'remove' class = 'btn btn-warning'> Remove </button> </td>";
            echo "<td> </td>";
            echo "</form>";
            echo "<tr>";
        }
        echo "</table>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Pacifico|Trocchi" rel="stylesheet">
    </head>
    <body>
        <h1>Order So Far</h1>
        <!-- Cart Items -->
        <?php
            displayCart();
        ?>

        <input type = "submit" id = "order" value = "Order">

        <?php
            if(isset($_POST['remove'])) {
                $key = array_search($_POST['itemName'],$_SESSION['cart']); 
                unset($_SESSION['cart'][$key]);
            }
        ?>
        <button id = "back">Return</button>
    </body>
    
    <script type="text/javascript">
        $("#back").click(function(){
            window.location.href = "redirect.php";
        });
        
        $("#remove").click(function(){
            window.location.reload(true);
        });
        
        $("#order").click(function(){
            window.location.href = "submitOrder.php";
        });
    </script>
</html>

