<?php
  include("includes/handler/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
    $account=new Account($con);
  include("includes/handler/register_handler.php");
  include("includes/handler/login_handler.php");

  //Remember values from input
   function getInputValue($name){
      if (isset($_POST[$name])) {
        echo $_POST[$name];
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
    <style>
      body {
        font-family: 'Roboto', serif;
        font-size: 20px;
      }
    </style>


  <?php
 
    if(isset($_POST['registerButton'])) {
        echo '<script>
                $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#registerForm").show();
                });
            </script>';
    }
    else {
        echo '<script>
                $(document).ready(function() {
                    $("#loginForm").show();
                    $("#registerForm").hide();
                });
            </script>';
    }
 
    ?>





  </head>
  <body>
  <div class="jumbotron" id="background">
    <div class="loginContainer">
         <div id="inputContainer">
         <form id="loginForm" action="register.php" method="POST">
          <h4>Login to you account</h4>
          <div class="form-group">
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <span class="fa fa-user" aria-hidden="true"></span>
            <label for="loginUsername">Username</label>
            <input type="text" class="form-control "  id="loginUsername"  name="loginUsername" required>
            </div>
          <div class="form-group">
            <span class="fa fa-unlock-alt" aria-hidden="true"></span>
            <label for="loginPassword">Password</label>
            <input type="password" class="form-control " id="loginPassword" name="loginPassword"  required>
          </div>
          <button type="submit" name="loginButton" class="btn btn-outline-success btn-lg">
            <span class="fa fa-sign-in" aria-hidden="true"></span>  Sign In</button> 
          <span id="hideLogin">Don't have an account yet? Signup here.</span>
       </form>
       

       

       <form id="registerForm" action="register.php" method="POST">
        <h4>Create free account with Slotify</h4>
          <div class="form-group1">
              <?php echo $account->getError(Constants::$usernameLength); ?>
              <?php echo $account->getError(Constants::$usernameExisting); ?>
              <label for="username">Username</label>
              <input type="text" class="form-control " id="username"  name="username" value="<?php getInputValue('username') ?>"  required >


              <?php echo $account->getError(Constants::$firstNameLength); ?>
              <label for="firstName">First name</label>
              <input type="text" class="form-control " id="firstName"  name="firstName" value="<?php getInputValue('firstName') ?>" required>


              <?php echo $account->getError(Constants::$lastNameLength); ?>
              <label for="lastName">Last name</label>
              <input type="text" class="form-control " id="lastName"  name="lastName" value="<?php getInputValue('lastName') ?>"  required>



              <?php echo $account->getError(Constants::$emails_DontMatch); ?>
              <?php echo $account->getError(Constants::$email_InvalidFormat); ?>
              <?php echo $account->getError(Constants::$emailExisting); ?>
              <label for="email">Email</label>
              <input type="email" class="form-control " id="email"  name="email" value="<?php getInputValue('email') ?>" required>


              
              <label for="email2">Confirm email</label>
              <input type="email" class="form-control " id="email2"  name="email2" value="<?php getInputValue('email2') ?>" required>
          </div>
           <div class="form-group">
            <?php echo $account->getError(Constants::$passwords_DontMatch); ?>
            <?php echo $account->getError(Constants::$passwordsCharacters); ?>
            <?php echo $account->getError(Constants::$passwords_LengthChar); ?>
            <label for="password">Password</label>
            <input type="password" class="form-control " id="password" name="password"  required>

            <label for="password2">Confirm password</label>
            <input type="password" class="form-control " id="password2" name="password2"  required>
          </div>
          <button type="submit" name="registerButton" class="btn btn-outline-success btn-lg" ><span class="fa fa-user-plus" aria-hidden="true"></span>  Register</button> 
          <span id="hideRegister">Have an account? Signin here.</span>
       </form>
        
      </div>
        <div id="loginText">
            <h1>Get great music, right now</h1>
            <h2>Listen to load of songs free!</h2>
            <ul>
                <li>Discover musics you'll fall in love with it.</li>
                <li>Follow artists to keep up to date.</li>
                <li>Create your own playlist.</li>
            </ul>
        </div>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>