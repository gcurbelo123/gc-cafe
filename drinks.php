<?php
session_start();
include 'connect.php';
function checkUser(){
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    } 
}

function showDrinks(){
    $db = getDBConnection();
    
    $sql = "SELECT * FROM drinks";
    
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $drinks = $stmt->fetchAll();
    
    echo "<table class = 'table' align = 'center'>";
    foreach($drinks as $drink) {
        $drinkName = $drink['name'];
        $drinkPrice = $drink['price'];
        $drinkImage = $drink['image_url'];
        $drinkId = $drink['drink_id'];
        
        echo "<tr>";
        echo "<td><img src = '$drinkImage' width = '150px' height = '150px' padding-right = '200px'></td>";
        echo "<td id = 'item'><h4>$drinkName</h4></td>";
        echo "<td id = 'item'><h4>$drinkPrice</h4></td>";
        
        echo "<form method = 'post'>";
        echo "<input type = 'hidden' name = 'itemName' value = '$drinkName'>";
        echo "<input type = 'hidden' name = 'itemId' value = '$itemId'>";
        echo "<input type = 'hidden' name = 'itemImage' value = '$itemImage'>";
        echo "<input type = 'hidden' name = 'itemPrice' value = '$itemPrice'>";
        echo "<td> <button class = 'btn btn-warning'> Add </button> </td>";
        echo "<td> </td>";
        echo "</form>";
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
            <h1> Sip Up! </h1>
        </header>
        <?=showDrinks()?>
        <hr width = "0%"/>
        <button id = "back">Return</button>
    </body>
    <?php
        if(isset($_POST['itemName'])){
            $newItem = array();
            $newItem['customer'] = $_SESSION['username'];
            $newItem['item'] = $_POST['itemName'];
            $newItem['date'] = "test";
            $newItem['time'] = "test";
            
            array_push($_SESSION['cart'], $newItem);
        }
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
    ?>
    <script type="text/javascript">
        $("#back").click(function(){
            window.location.href = "menu.php";
        });
    </script>

</html>