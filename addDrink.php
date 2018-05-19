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
            <h1> Add Drink </h1>
        </header>
        <hr width = "0%"/>
        <div id = "content">
            <form method = "post" action = "createItem.php">
                <input type = "text" name = "drinkName" placeholder = "Drink Name"/><br/>
                <input type = "text" name = "drinkPrice" placeholder = "Drink Price"/><br/>
                <input type = "text" name = "drinkURL" placeholder = "Drink Image URL"/><br/>
                <button id = "addDrink">Add Drink</button>
            </form>
            <div id = "error"></div>
        </div>
        <button id = "back">Return</button>
    </body>
    
    
    <script type="text/javascript">
        $("#back").click(function(){
            window.location.href = "create.php";
        });
        
        $("#addDrink").click(function(event){
            var drinkName = $("input[name = 'drinkName']").val();
            var drinkPrice = $("input[name = 'drinkPrice']").val();
            var url = $("input[name = 'drinkURL']").val();
            
            if(drinkName === "" || drinkPrice === "" || url === ""){
                event.preventDefault();
                if(drinkName === ""){
                    $("#error").html("");
                    $("#error").append("No drink name entered");
                }
                else if(drinkPrice === ""){
                    $("#error").html("");
                    $("#error").append("No drink price entered");
                }
                else {
                    $("#error").html("");
                    $("#error").append("No drink image url entered");
                }
            }
        })
    </script>

</html>