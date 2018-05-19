<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

//Checking credentials in database
if(isset($_POST['drinkName'])){
    $sql = "SELECT * FROM drinks WHERE name = :drink";
    $drink = $_POST['drinkName'];
    $stmt = $connect->prepare($sql);
    
    $data = array(":drink" => $_POST['drinkName']);
                
    $stmt->execute($data);
    
    $drink = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($drink)){
        $sql = "INSERT INTO drinks (drink_id, name, price, image_url) VALUES (NULL, :drinkName, :drinkPrice, :drinkImage)";
        $stmt = $connect->prepare($sql);
        $data = array(":drinkName" => $_POST['drinkName'],
                ":drinkPrice" => $_POST['drinkPrice'],
                ":drinkImage" => $_POST['drinkURL']);
        $stmt->execute($data);
        echo "<script>
                alert('Added successfully!');
              </script>";
        header('Location: admin.php');
    } else {
        echo "<script>
                alert('Food/Drink already in system');
              </script>";
        header('Location: addDrink.php');
    }
}
if(isset($_POST['foodName'])){
    $sql = "SELECT * FROM food WHERE name = :food";
    $food = $_POST['foodName'];
    $stmt = $connect->prepare($sql);
    
    $data = array(":food" => $_POST['foodName']);
                
    $stmt->execute($data);
    
    $food = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($food)){
        $sql = "INSERT INTO food (food_id, name, price, image_url) VALUES (NULL, :foodName, :foodPrice, :foodImage)";
        $stmt = $connect->prepare($sql);
        $data = array(":foodName" => $_POST['foodName'],
                ":foodPrice" => $_POST['foodPrice'],
                ":foodImage" => $_POST['foodURL']);
        $stmt->execute($data);
        echo "<script>
                alert('Added successfully!');
              </script>";
        header('Location: admin.php');
    } else {
        echo "<script>
                alert('Food/Drink already in system');
              </script>";
        header('Location: addFood.php');
    }
}

?>