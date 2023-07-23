<?php
   // Initialize the session
   session_start();
   
   // Check if the user is already logged in, if yes then redirect him to welcome page
   if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
       header("location: /login.php");
       exit;
   }
   require_once "./inc/db.php";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['packages'])){
         $data = $_POST['packages'];

         if (strpos($data, ',') !== false) {
            $splitData = explode(',', $data);
            print_r($splitData);
         }else{
            // one package
            echo $data;
         }
      }      
   }  
    
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon" />
      <script  src="https://kit.fontawesome.com/b7c265b79a.js"      crossorigin="anonymous"    ></script>
      <link rel="stylesheet" href="/assets/css/style.css" />
      <link rel="stylesheet" href="/assets/css/main.css" />
      <style>
         .rockback{
            background-image: url('./assets/img/boosts_back.png');
         }
      </style>
      <title>KINGZ CRYPTO</title>
   </head>
   <body>
      <?php     include_once "./inc/nav2.php";  ?>
      <?php  include_once "./inc/search.php";  ?>
      <section class="tabs">
         <div class="container">
            <ul>
               <li class="is-active">
                  <a href="/boosts.php">
                  <span>Buy Boosts</span>
                  </a>
               </li>
               <li class="">
                  <a href="/boots_payment.php">
                  <span>Your payments</span>
                  </a>
               </li>
            </ul>
         </div>
      </section>
      <div class="container">
         <div class="mobile-navigation mt-3">
            <div class="current">
               <div class="dropdown-title">
                  Buy Boosts
               </div>
               <svg class="navigation-arrow" width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.96478 6.3128C6.02441 6.37053 6.10421 6.41774 6.19729 6.45035C6.29038 6.48296 6.39396 6.5 6.49912 6.5C6.60428 6.5 6.70786 6.48296 6.80094 6.45035C6.89403 6.41774 6.97382 6.37053 7.03346 6.3128L12.8839 0.679854C12.9516 0.614883 12.9913 0.538784 12.9987 0.459824C13.0061 0.380865 12.9809 0.302066 12.9258 0.231988C12.8708 0.16191 12.7879 0.103234 12.6863 0.0623343C12.5847 0.0214347 12.4683 -0.000124074 12.3496 5.37146e-07H0.648661C0.53025 0.000326559 0.414212 0.0221626 0.313027 0.0631601C0.211842 0.104158 0.129337 0.162766 0.0743855 0.232682C0.019434 0.302597 -0.00588502 0.381176 0.00115111 0.459966C0.00818723 0.538756 0.0473123 0.614777 0.114319 0.679854L5.96478 6.3128Z" fill="#00A676"></path>
               </svg>
            </div>
            <ul class="options">
               <li>
                  <a href="/boosts.php">Buy Boosts</a>
               </li>
               <li class="">
                  <a href="/boots_payment.php">Boost Payments</a>
               </li>
            </ul>
         </div>
      </div>

      <?php include_once "./inc/banner_top.php" ?>



      <section class="boosts">
         <div class="container">
            <h1>Purchase Boosts</h1>
            <p>Purchase boosts here to boost projects in the promoted section! The promoted section is ranked by the
               amount of boosts the project received. Boosts are added to your account, you can then spend them at any
               time you like by clicking the "Boost" button on a project in our Promoted section.
            </p>
            <hr>
            <div class="columns">
               <div class="column is-6">
                  <h2>1. Select Packages</h2>
                  <div class="boost-packages">
                     <div class="columns is-multiline is-mobile">
                        <?php
                        $sql = "SELECT * FROM boosts_list";
                        $res = executeQueryV2($sql, $mysqli);
                        //print_r($res);
                        if(!empty($res)){
                           foreach($res as $i => $row){
                              $id = $row['id'];
                              $package = $row['package'];
                              $price = $row['price'];
                              $boosts = $row['boosts'];
                              $bonus = $row['bonus'];
                              $tboosts = intval($boosts) + intval($bonus);
                              
                              if($id == '1' || $id == '9'){
                                 $image = "rocket$id.gif";
                              }else{
                                 $image = "rocket$id.png";
                              }

                              echo "<div class='column is-4-tablet is-6-mobile'>
                                    <div class='boost-package' data-id='$package' data-name='$tboosts Boost' data-boosts='$boosts' data-bonus='$bonus' data-total='$tboosts' data-price='$price'>
                                       <div class='header'>
                                          <p><span class='tag'>x $tboosts </span> Boost</p>
                                          <i class='fa fa-check-circle'></i>
                                       </div>
                                       <div class='inner rockback' style=''>
                                          <img src='./assets/img/$image' alt='$tboosts Boost' data-id='$id'>
                                          <p><span class='tag gray'>x$boosts</span>+$bonus Bonus</p>
                                          <p class='price'>$ $price</p>
                                       </div>
                                    </div>
                                 </div>";
                           }
                        }                        
                        ?>                       
                     </div>
                  </div>
               </div>
               <div class="column is-4 is-offset-2">
                  <h2>2. Confirm Order</h2>
                  <form action="/bpay.php" method="POST">
                     <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']  ?>">
                     <div class="confirm-order">
                        <input type="hidden" name="packages">
                       
                        <div class="header">
                           <p><b>Boost Package</b></p>
                           <p><span class="count">0</span> package<span class="s is-hidden">s</span> selected</p>
                        </div>
                        <div class="has-table">
                           <table class="table boost-packages is-fullwidth">
                              <thead>
                                 <tr>
                                    <th>Package</th>
                                    <th>Boosts</th>
                                    <th>Price</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td class="has-text-centered" colspan="6">Please select Boost package</td>
                                 </tr>                                
                              </tbody>
                           </table>
                        </div>
                        <div class="has-table">
                           <h3>Order Summary</h3>
                           <table class="table order-summary is-fullwidth">
                              <tbody>
                                 <tr>
                                    <th>Total Boosts</th>
                                    <td class="total-boosts"><span class="tag">x0</span></td>
                                 </tr>
                                 <tr>
                                    <th>Total Price</th>
                                    <td class="total-price">$ 0</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="has-button">
                           <button type="submit" class="button is-primary" >
                           Buy <span class="boost-amount"></span> Boosts
                           </button>
                        </div>
                      
                     </div>
                  </form>
               </div>
            </div>
            <div class="columns">
            </div>
            <div class="need-help">
               Need help? <a class="button is-primary" target="_blank" href="https://t.me/duncancoinsniper"><img src="/assets/img/telegram-white.svg">Contact support</a>
            </div>
         </div>
      </section>

      <?php include_once "./inc/banner_down.php" ?>
      <?php include_once "./inc/footer.php"; ?>
      <script  src="./assets/jquery-3.7.0.min.js" ></script>
      <script defer src="./assets/script/main.js"></script>
      <script>
         $(document).ready(function () {
             let cart = [];
         
             function addToCart(packageId) {
                 packageId = parseInt(packageId)
         
                 for(const id in cart) {
                     let _packageId = cart[id]
                     if(_packageId == packageId) {
                         return updateCartHtml()
                     }
                 }
         
                 cart.push(packageId)
                 cart.sort()
         
                 $('.boost-package[data-id=' + packageId + ']').addClass('is-active')
         
                 updateCartHtml()
             }
         
             function removeFromCart(packageId) {
                 for(const id in cart) {
                     let _packageId = cart[id]
                     if(_packageId == packageId) {
                         cart.splice(id, 1)
                     }
                 }
         
                 $('.boost-package[data-id=' + packageId + ']').removeClass('is-active')
         
                 updateCartHtml()
             }
         
             function updateInputField() {
                 let serialized = cart.join(',')
                 console.log(serialized)
                 $('.confirm-order [name=packages]').val(serialized)
         
                 console.log($('.confirm-order [name=packages]').val())
             }
         
             function updateCartHtml() {
                 console.log(cart)
                 $('.confirm-order .boost-packages tbody').html('')
         
                 for (const id in cart) {
                     let packageId = cart[id]
                     let element = $('.boost-package[data-id=' + packageId + ']')
                     let packageName = $(element).data('name')
                     let packageBoosts = $(element).data('boosts')
                     let packageBonusBoosts = $(element).data('bonus')
                     let packageTotalBoosts = $(element).data('total')
                     let packagePrice = $(element).data('price')
         
                     let insert = "<tr>" +
                         `<td><b><span class="tag gray">x${packageBoosts}</span> Boosts</b> <br><span class="small">+${packageBonusBoosts} Bonus</span></td>` +
                         `<td><span class="tag">x${packageTotalBoosts}</span></td>` +
                         `<td>$ ${packagePrice}</td>` +
                         `<td><img class="remove-package" src="/assets/img/payments/close.svg" data-id="${packageId}"></td>` +
                         "</tr>"
         
                     $('.confirm-order .boost-packages tbody').append(insert)
                 }
         
                 if (cart.length == 0) {
                     $('.confirm-order .boost-packages tbody').html('<tr><td class="has-text-centered" colspan="6">Please select Boost package</td></tr>')
                     $('.confirm-order .button').attr('disabled', true)
                 } else {
                     $('.confirm-order .button').attr('disabled', false)
                 }
         
                 updateTotals()
                 updateInputField()
             }
         
             function updateTotals() {
                 let totalBoosts = 0
                 let totalPrice = 0
         
                 for(const id in cart) {
                     let packageId = cart[id]
         
                     totalBoosts += getBoosts(packageId)
                     totalPrice += getPrice(packageId)
                 }
         
                 $('.order-summary .total-boosts span.tag').html('x' + totalBoosts)
                 $('.order-summary .total-price').html('$ ' + totalPrice.toLocaleString('en-US'))
                 $('.confirm-order .has-button .boost-amount').html(totalBoosts)
                 $('.confirm-order .header .count').html(cart.length == 0 ? 'No' : cart.length)
                 if(cart.length > 1) {
                     $('.confirm-order .header span.s').removeClass('is-hidden')
                 } else {
                     $('.confirm-order .header span.s').addClass('is-hidden')
                 }
                 console.log('Totals:', totalBoosts, totalPrice)
             }
         
             function getBoosts(packageId) {
                 return parseInt($('.boost-package[data-id=' + packageId + ']').data('total'))
             }
             function getPrice(packageId) {
                 return parseInt($('.boost-package[data-id=' + packageId + ']').data('price'))
             }
         
             $('.boost-package').click(function(){
                 let packageId = $(this).data('id')
         
                 if(cart.indexOf(packageId) == -1)
                     addToCart(packageId)
                 else
                     removeFromCart(packageId)
             })
         
             $(document).on('click', '.remove-package', function(e){
                 removeFromCart($(e.target).data('id'))
             })
         })
      </script>
   </body>
</html>