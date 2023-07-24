<?php
// Initialize the session
session_start();


 if(isset( $_SESSION['forgot'])){
    $ticket = $_SESSION['forgot'];
 }else{
    header('Location: /');
    exit();
 }


 
// Include config file
require_once "./inc/db.php";
 
// Define variables and initialize with empty values
$password1 = $password2 = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["password1"]))) {
        $username_err = "Please enter New Password.";
    } else {
        $password1 = trim($_POST["password1"]);
    }
    
    // Check if password is empty
    if (empty(trim($_POST["password2"]))) {
        $password_err = "Please Confirm password.";
    } else {
        $password2 = trim($_POST["password2"]);
    }
    
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
       if($password1 == $password1){
            $new = password_hash($password1, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password = '$new' WHERE ticket = '$ticket'";
            if(executeQueryV2($sql, $mysqli)){
                header('Location: /login.php');
                exit();
            }
       }else{
            $login_err = "Please make sure your password it match";
       }
       
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <script  src="https://kit.fontawesome.com/b7c265b79a.js"      crossorigin="anonymous"    ></script>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
  
    <title>KINGZ CRYPTO</title>
  </head>
  <body>
  <?php     include_once "./inc/nav2.php";  ?>

  
  <section class="login">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="inner">
                    <div class="top">
                        <h1>Reset Password</h1>
                        <h2></h2>
                    </div>
                    <form method="POST" action="/reset.php">
                        <input type="hidden" name="ticket" value="">                       
                     
                        <div class="field">
                            <label class="label">New Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Email" name="password1" required="" value="">
                            </div>   
                            <p class="help is-danger"><?php echo $login_err; ?></p>                                                 
                          </div>
                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Password" name="password2" required="">
                            </div>                                                                              
                          </div>
                        <div>
                           
                        </div>

                       

                        <div class="field submit-button">
                            <div class="control">
                                <input type="submit" value="Save" class="button is-primary">
                            </div>
                        </div>
                    </form>

                    <br>
                    <div class="register">
                        Don’t have an account? <a href="/register.php" class="is-primary">Register Here.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
  


  
  <?php include_once "./inc/footer.php"; ?>
  <script  src="./assets/jquery-3.7.0.min.js" ></script>
  <script defer src="./assets/script/main.js"></script>
  </body>
</html>
