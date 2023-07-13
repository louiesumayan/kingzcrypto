<?php 
require "./inc/db.php";


// Define variables and initialize with empty values
$name = $email= $password = $confirm_password = "";
$name_err = $username_err = $password_err = $confirm_password_err = $pswdno ="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter a username.";
    } elseif(preg_match('/^[a-zA-Z0-9_@]+$/', trim($_POST["email"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "The email has already been taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                $pswdno = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["password_confirmation"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["password_confirmation"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    $name = trim($_POST["name"]);

   

    
    // Check input errors before inserting in database
    if( empty($username_err) && empty($password_err) && empty($confirm_password_err)){        
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (email, password, name) VALUES (?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_password, $param_name);
            
            // Set parameters
            $param_name = $name;
            $param_username = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: /login.php");
            } else{
                $pswdno = "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }else{
        $pswdno = "Password did not match"; 
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

  <section class="register">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="inner">
                    <div class="top">
                        <h1>Register</h1>
                        <h2>Create your account at CoinSniper to unlock new features.</h2>
                        <p class="help is-danger"><?php echo $pswdno; ?></p>
                    </div>

                    
                    <form method="POST" action="/register.php">
                        <input type="hidden" name="_token" value="qFxfCl4QzJyZzuyYHSkbcFNh2FAnpVQuEqMrPkud">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Name" name="name" required="" value="">
                            </div>
                                                    </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" type="email" placeholder="Email" name="email" required="" >                                
                            </div>
                            <p class="help is-danger"><?php echo $username_err; ?></p>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" type="password" placeholder="Password" name="password" required="" value="">
                                
                            </div>
                            <p class="help is-danger"><?php echo $password_err; ?></p>
                        </div>
                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" type="password" placeholder="Confirm Password" name="password_confirmation" required="" value="">
                               
                            </div>
                         </div>
                         <p class="help is-danger"><?php echo $confirm_password_err; ?></p>


                        <div class="field submit-button">
                            <div class="control">
                                <input type="submit" value="Register" class="button is-primary">
                            </div>
                        </div>
                        <div class="register">
                            Already registered?
                            <a href="/login.php">
                                Login here.
                            </a>
                        </div>
                    </form>
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
