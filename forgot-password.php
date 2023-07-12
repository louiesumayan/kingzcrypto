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
                <div class="column is-6 is-offset-3">
                    <div class="inner">
                        <h1>Forgot Password</h1>
                        <h2>Enter your email address below to reset your password.</h2>

                        
                        <form method="POST" action="https://coinsniper.net/forgot-password">
                            <input type="hidden" name="_token" value="1xq7yfiPysuC7SgZoIGc0HhnBOrxW5UyFSsd4zdz">
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input class="input" type="email" placeholder="Email" name="email" required="" value="">
                                </div>
                                                            </div>

                            <a href="https://coinsniper.net/login">
                                Back to login.
                            </a>

                            <div class="field">
                                <div class="control">
                                    <input type="submit" value="Email Password Reset Link" class="button is-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  


  
  <?php include_once "./inc/footer.php"; ?>
   
  </body>
</html>
