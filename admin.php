<?php
session_start();

function displayMain(){
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
        <h1>Gilbert's Cafe</h1>
        <?php
          
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src = "js/functions.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              $('#previous').on('click', function(){
                // Change to the previous image
                $('#im_' + currentImage).stop().fadeOut(1);
                decreaseImage();
                $('#im_' + currentImage).stop().fadeIn(1);
              }); 
              $('#next').on('click', function(){
                // Change to the next image
                $('#im_' + currentImage).stop().fadeOut(1);
                increaseImage();
                $('#im_' + currentImage).stop().fadeIn(1);
              }); 
            
              var currentImage = 1;
              var totalImages = 3;
            
              function increaseImage() {
                /* Increase currentImage by 1.
                * Resets to 1 if larger than totalImages
                */
                ++currentImage;
                if(currentImage > totalImages) {
                  currentImage = 1;
                }
              }
              function decreaseImage() {
                /* Decrease currentImage by 1.
                * Resets to totalImages if smaller than 1
                */
                --currentImage;
                if(currentImage < 1) {
                  currentImage = totalImages;
                }
              }
            });
        </script>
        <link href="https://fonts.googleapis.com/css?family=Pacifico|Trocchi" rel="stylesheet">
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" />
    </head>
    <body>
        <?=displayMain()?>
        <nav>
            <hr width = "0%"/>
            <div id = "links">
                <span id = "currentLink"><a href = "menu.php">Menu</a></span>
            </div>
            <div id = "links">
                <a href = "order.php">Order</a></div>
            <div id = "links">
                <a href = "orders.php">Order History</a></div>
                <a href = "create.php">Create Item</a>
            
        </nav>
        <div id="showContainer">

          <div class="imageContainer" id="im_1">
            <img src="images/1.png" />
            <div class="caption">
              Team
            </div>
          </div>
    
          <div class="imageContainer" id="im_2">
            <img src="images/2.jpg" />
            <div class="caption">
              Coffee
            </div>
          </div>
    
          <div class="imageContainer" id="im_3">
            <img src="images/3.jpg" />
            <div class="caption">
              Support
            </div>
          </div>
          
          <div class="navButton" id="previous">&#10094;</div>
          <div class="navButton" id="next">&#10095;</div>
        </div>
        <div id = "welcomeText1">
            For 23 years we have been proud to serve the best coffee on the Monterey Peninsula! 
        </div>
        <div id = "welcomeText2">
            Stop by and come meet our experienced and friendly staff that is sure to make your visit 
        </div>
        <div id = "welcomeText3">
            one you won't regret, but more importantly, one you will always remember!
        </div>
        <h2>Welcome,
        <?php
          echo $_SESSION['username'];
        ?>!<br/>
        <input type="button" id="logoutBtn" value = "Logout"/></h2>
    </body>

</html>