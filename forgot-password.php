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
               <div class="column is-6 is-offset-3">
                  <div class="inner">
                     <h1>Forgot Password</h1>
                     <h2>Enter your email address below to reset your password.</h2>
                     <form method="POST" action="/api.php">
                        <input type="hidden" name="forgot" value="true">
                        <div class="field">
                           <label class="label">Email</label>
                           <div class="control">
                              <input class="input" type="email" placeholder="Email" name="email" required="" value="">
                           </div>
                        </div>
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
      <script  src="./assets/jquery-3.7.0.min.js" ></script>
      <script defer src="./assets/script/main.js"></script>
   </body>
</html>