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

  <section class="register">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="inner">
                    <div class="top">
                        <h1>Register</h1>
                        <h2>Create your account at CoinSniper to unlock new features.</h2>
                    </div>

                    
                    <form method="POST" action="https://coinsniper.net/register">
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
                                <input class="input" type="email" placeholder="Email" name="email" required="" value="">
                            </div>
                                                    </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Password" name="password" required="" value="">
                            </div>
                                                    </div>
                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Confirm Password" name="password_confirmation" required="" value="">
                            </div>
                                                    </div>

                        <div class="field">
                            <div class="cf-turnstile" data-sitekey="0x4AAAAAAADriqOZzUyrDNej"><iframe src="https://challenges.cloudflare.com/cdn-cgi/challenge-platform/h/b/turnstile/if/ov2/av0/rcv0/0/ouvb3/0x4AAAAAAADriqOZzUyrDNej/auto/normal" allow="cross-origin-isolated" sandbox="allow-same-origin allow-scripts allow-popups" id="cf-chl-widget-ouvb3" tabindex="0" title="Widget containing a Cloudflare security challenge" style="border: none; overflow: hidden; width: 300px; height: 65px;"></iframe><input type="hidden" name="cf-turnstile-response" id="cf-chl-widget-ouvb3_response" value="0.4wol43Cn9LaPOBxk31rJ8vhgq5vOvhuqEhs2--nxSynOsNk2m3I8SJii3hnolFwSWhnmbJQ98lBJ8-Ea9BdnKjjdBlBqnbvyKhA-Nl9VbtKzkuuLw0lexcXGoEYVn7ym8UGXw-Y937Ns44-tx-wfoF-rkcBa1o3kwqoKy-jzpb156iyRO2qhQQhfRfqr_Y0DtMLl5LlJd4l77cN11HrXH1yT5vaH-AKDtaXKkzW9C4-OWH3o_yIGPGYVYJ6OW824amb9EgmIQoMjjH7VI99qoyNtn__BCpmapBAJcAJFeeyI0kooWFK95PmzDTVupCt0Kkj6BEaQc53edvkTLonLBAAixBOoxBeeN9iHldPqLgaQqTXJnBCnM8ng1_PJrgS_jSvd5OYWhFbRfCk01qLDcw.iBm3hKrV_L1p6JavzWl5XQ.13d14a9dcff8b415bcc9e69a860974ce79c91df4b881600751e25a9d1291a1cf"></div>
                                                    </div>

                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="newsletter">
                                    Sign up for newsletter (no spam)
                                </label>
                            </div>
                        </div>

                        <div class="field submit-button">
                            <div class="control">
                                <input type="submit" value="Register" class="button is-primary">
                            </div>
                        </div>
                        <div class="register">
                            Already registered?
                            <a href="https://coinsniper.net/login">
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
   
  </body>
</html>
