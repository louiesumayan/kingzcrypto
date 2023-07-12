<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
    <script  src="https://kit.fontawesome.com/b7c265b79a.js"      crossorigin="anonymous"    ></script>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
      integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script defer src="./assets/script/index.js"></script>
    <title>KINGZ CRYPTO</title>
  </head>
  <body>
  <?php     include_once "./inc/nav.php";  ?>

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
   
  </body>
</html>
