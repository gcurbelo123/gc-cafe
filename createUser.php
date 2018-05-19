<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

//Checking credentials in database
$sql = "SELECT * FROM users WHERE username = :username
        AND password = :password";
$name = $_POST['username'];
print($name);
print(sha1($_POST['password']));
$stmt = $connect->prepare($sql);

$data = array(":username" => $_POST['username'],
            ":password" => sha1($_POST['password']));
            
$stmt->execute($data);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo "User: ";
print_r($user);
//redirecting user to quiz if credentials are valid
if(empty($user)){
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $connect->prepare($sql);
    $data = array(":username" => $_POST['username'],
            ":password" => sha1($_POST['password']));
    $stmt->execute($data);
    $_SESSION['username'] = $_POST['username'];
    header('Location: index.php');
} else {
    echo "<script>
            alert('Username already taken');
          </script>";
}

?>