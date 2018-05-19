<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

//Checking credentials in database
$sql = "SELECT * FROM users WHERE username = :username
        AND password = :password";
$name = $_POST['username'];

$stmt = $connect->prepare($sql);

$data = array(":username" => $_POST['username'],
            ":password" => sha1($_POST['password']));
            
$stmt->execute($data);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($user['username'])){
    $_SESSION['username'] = $user['username'];
    if($_SESSION['username'] === "admin")
        header('Location: admin.php');
    else
        header('Location: index.php');
} else {
    echo "The values you entered were incorrect. 
          <a href = 'login.php'> Retry </a>";
}

?>