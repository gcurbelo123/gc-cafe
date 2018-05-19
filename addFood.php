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
            <h1> Add Food </h1>
        </header>
        <hr width = "0%"/>
        <div id = "content">
            <form method = "post" action = "createItem.php">
                <input type = "text" name = "foodName" placeholder = "Food Name"/><br/>
                <input type = "text" name = "foodPrice" placeholder = "Food Price"/><br/>
                <input type = "text" name = "foodURL" placeholder = "Food Image URL"/><br/>
                <button id = "addFood">Add Food</button>
            </form>
            <div id = "error"></div>
        </div>
        <button id = "back">Return</button>
    </body>
    
    
    <script type="text/javascript">
        $("#back").click(function(){
            window.location.href = "create.php";
        });
        
        $("#addFood").click(function(event){
            var foodName = $("input[name = 'foodName']").val();
            var foodPrice = $("input[name = 'foodPrice']").val();
            var url = $("input[name = 'foodURL']").val();
            
            if(foodName === "" || foodPrice === "" || url === ""){
                event.preventDefault();
                if(foodName === ""){
                    $("#error").html("");
                    $("#error").append("No food name entered");
                }
                else if(foodPrice === ""){
                    $("#error").html("");
                    $("#error").append("No food price entered");
                }
                else {
                    $("#error").html("");
                    $("#error").append("No food image url entered");
                }
            }
        })
    </script>

</html>