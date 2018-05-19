<?php
session_start();

function displayMenu(){
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    } 
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
        <?=displayMenu()?>
        <header id = "name">
            <h1> Gilbert's Menu </h1>
        </header>
        <hr width = "0%"/>
        <div id = "content">
        <table align = center>
            <tr>
                <td>
          <div class="imgContainer">
                    <div>
                        <img src="images/coffee.jpeg"/>
                    </div>
                    <div class="imgButton">
                        <a class="my-button" title="drinks" href="drinks.php">Drinks</a>
                    </div>
             </div>
                </td>
          <td>
          <div class="imgContainer">
                    <div>
                        <img src="images/food.png"/>
                    </div>
                    <div class="imgButton">
                        <a class="my-button" title="food" href="food.php">Food</a>
                    </div>
             </div>
                </td>
            </tr>
        </table>
        </div>
        <button id = "back">Return</button>
    </body>
    
    
    <script type="text/javascript">
        $("#back").click(function(){
            window.location.href = "redirect.php";
        });
    </script>

</html>