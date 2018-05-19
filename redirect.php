<?php
    session_start();
    if($_SESSION['username'] === "admin"){
        header('Location: admin.php');
    } else {
        header('Location: index.php');
    }
?>