<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /dashboard");
    exit;
}
 

 
// Include config file
require_once "./inc/db.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["email"]))) {
        $username_err = "Please enter username.";
    } else {
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        //$sql = "SELECT id, username, urole, password, name FROM users WHERE username = ? and urole is not null";
        $sql = "SELECT id, email, name, password, auth FROM user where email = ? and auth is not null";
        
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $email;
            
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $email, $name, $hashed_password, $auth);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session                            
                            
                            // Store data in session variables
                            $token = bin2hex(random_bytes(16));
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $username;                           
                            $_SESSION["name"] = $name;
                            $_SESSION["_token"] = $token;
                            $_SESSION["auth"] = $auth;
                            
                            
                            // Redirect user to welcome page
                            header("location: /");
                            exit();
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Check Your Email to confirm your account.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
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
                        <h1>Login</h1>
                        <h2>Log in to get access to your CoinSniper account.</h2>
                    </div>
                    <form method="POST" action="/login.php">
                        <input type="hidden" name="_token" value="qFxfCl4QzJyZzuyYHSkbcFNh2FAnpVQuEqMrPkud">                        
                        <input type="hidden" name="redir" value="">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" placeholder="Email" name="email" required="" value="">
                            </div>   
                            <p class="help is-danger"><?php echo $login_err; ?></p>                                                 
                          </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Password" name="password" required="">
                            </div>                                                                              
                          </div>
                        <div>
                           
                        </div>

                        <div class="forgot-password">
                            <a href="/forgot-password.php">
                                Forgot password?
                            </a>
                        </div>

                        <div class="field submit-button">
                            <div class="control">
                                <input type="submit" value="Login" class="button is-primary">
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
