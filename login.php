<!DOCTYPE html>
<html>
    <head>
        <title>Cafe Watch</title>
        <link href="css/login.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        
    </head>
    <body>
        <h1>Login</h1>
        <h2>Credentials required before accessing cafe</h2>
        
        <!--Form to enter credentials-->
        <div class="login-page">
          <div class="form">
            <form method = "post" action = "createUser.php" class="register-form">
              <input type = "text" name = "username" placeholder = "Username"/>
              <input type="password" name = "password" placeholder="Password"/>
              <input type="password" name = "confirm" placeholder="Confirm Password"/>
              <button id = "signup">create</button>
              <div id = "error"></div>
              <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form method = "post" action = "verifyUser.php" class="login-form">
              <input type="text" name = "username" placeholder="Username"/>
              <input type="password" name = "password" placeholder="Password"/>
              <button type = "submit">login</button>
              <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
          </div>
        </div>
    </body>
    <script type="text/javascript">
        /*global $*/
        $('.message a').click(function(){
           $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
        
        $("#signup").click(function(event){
          var username = $("input[name = 'username']").val();
          var pass = $("input[name = 'password']").val();
          var con = $("input[name = 'confirm']").val();
          
          if(username != ""){
            if(con != pass){
              $("#error").html("");
              $("#error").append("Passwords do not match");
              event.preventDefault();
            } else {
              // console.log(username);
              // console.log(pass);
              // console.log(con);
              //window.location.href = "createUser.php";
            }
          } else {
            $("#error").html("");
            $("#error").append("No username entered");
            event.preventDefault();
          }
        });
    </script>
</html>