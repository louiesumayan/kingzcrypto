<?php
   // Initialize the session
   session_start();
   //print_r($_SESSION);
   
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
            $package = count($splitData);  
         }else{
            // one package
            $package = 1;
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
      <link rel="stylesheet" href="/assets/css/flipdown.min.css">
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
      <section class="ads pay">
   <div class="container">
      <h2>Pay</h2>
      
      <div class="columns">
         <div class="column is-12-mobile is-6-tablet is-8-widescreen is-hidden">
            <form action="" method="POST" class="ad-pay-form">
               <div class="title">
                  1. Payment information
               </div>
               <p>This information is required by AML laws. Please fill them in accurately, or your payment could
                  fail. We never share any of your personal information with anyone, and store it securely.
               </p>
               <div class="columns is-multiline">
                  <div class="column is-6">
                     <div class="field">
                        <label class="label">First Name*</label>
                        <div class="control">
                           <input name="first_name" class="input" type="text" placeholder="Satoshi" required="">
                        </div>
                     </div>
                  </div>
                  <div class="column is-6">
                     <div class="control">
                        <div class="field">
                           <label class="label">Last Name*</label>
                           <input name="last_name" class="input" type="text" placeholder="Nakamoto" required="">
                        </div>
                     </div>
                  </div>
                  <div class="column is-6">
                     <div class="field">
                        <label class="label">Address (Street + Number)*</label>
                        <div class="control">
                           <input name="address1" class="input" type="text" placeholder="My Street 1234" required="">
                        </div>
                     </div>
                  </div>
                  <div class="column is-6">
                     <div class="field">
                        <label class="label">Addition</label>
                        <div class="control">
                           <input name="address2" class="input" type="text" placeholder="Addition">
                        </div>
                     </div>
                  </div>
                  <div class="column is-4">
                     <div class="field">
                        <label class="label">City*</label>
                        <div class="control">
                           <input name="city" class="input" type="text" placeholder="Moon City" required="">
                        </div>
                     </div>
                  </div>
                  <div class="column is-2">
                     <div class="field">
                        <label class="label">Postal*</label>
                        <div class="control">
                           <input name="postal" class="input" type="text" placeholder="12345" required="">
                        </div>
                     </div>
                  </div>
                  <div class="column is-6">
                     <div class="field">
                        <label class="label">Country*</label>
                        <div class="control">
                           <div class="select">
                              <select name="country" required="">
                                 <option value="" selected="">Select Country</option>
                                 <option value="AF">Afghanistan</option>
                                 <option value="AX">Åland Islands</option>
                                 <option value="AL">Albania</option>
                                 <option value="DZ">Algeria</option>
                                 <option value="AS">American Samoa</option>
                                 <option value="AD">Andorra</option>
                                 <option value="AO">Angola</option>
                                 <option value="AI">Anguilla</option>
                                 <option value="AQ">Antarctica</option>
                                 <option value="AG">Antigua and Barbuda</option>
                                 <option value="AR">Argentina</option>
                                 <option value="AM">Armenia</option>
                                 <option value="AW">Aruba</option>
                                 <option value="AU">Australia</option>
                                 <option value="AT">Austria</option>
                                 <option value="AZ">Azerbaijan</option>
                                 <option value="BS">Bahamas</option>
                                 <option value="BH">Bahrain</option>
                                 <option value="BD">Bangladesh</option>
                                 <option value="BB">Barbados</option>
                                 <option value="BY">Belarus</option>
                                 <option value="BE">Belgium</option>
                                 <option value="BZ">Belize</option>
                                 <option value="BJ">Benin</option>
                                 <option value="BM">Bermuda</option>
                                 <option value="BT">Bhutan</option>
                                 <option value="BO">Bolivia, Plurinational State of</option>
                                 <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                 <option value="BA">Bosnia and Herzegovina</option>
                                 <option value="BW">Botswana</option>
                                 <option value="BV">Bouvet Island</option>
                                 <option value="BR">Brazil</option>
                                 <option value="IO">British Indian Ocean Territory</option>
                                 <option value="BN">Brunei Darussalam</option>
                                 <option value="BG">Bulgaria</option>
                                 <option value="BF">Burkina Faso</option>
                                 <option value="BI">Burundi</option>
                                 <option value="KH">Cambodia</option>
                                 <option value="CM">Cameroon</option>
                                 <option value="CA">Canada</option>
                                 <option value="CV">Cape Verde</option>
                                 <option value="KY">Cayman Islands</option>
                                 <option value="CF">Central African Republic</option>
                                 <option value="TD">Chad</option>
                                 <option value="CL">Chile</option>
                                 <option value="CN">China</option>
                                 <option value="CX">Christmas Island</option>
                                 <option value="CC">Cocos (Keeling) Islands</option>
                                 <option value="CO">Colombia</option>
                                 <option value="KM">Comoros</option>
                                 <option value="CG">Congo</option>
                                 <option value="CD">Congo, the Democratic Republic of the</option>
                                 <option value="CK">Cook Islands</option>
                                 <option value="CR">Costa Rica</option>
                                 <option value="CI">Côte d'Ivoire</option>
                                 <option value="HR">Croatia</option>
                                 <option value="CU">Cuba</option>
                                 <option value="CW">Curaçao</option>
                                 <option value="CY">Cyprus</option>
                                 <option value="CZ">Czech Republic</option>
                                 <option value="DK">Denmark</option>
                                 <option value="DJ">Djibouti</option>
                                 <option value="DM">Dominica</option>
                                 <option value="DO">Dominican Republic</option>
                                 <option value="EC">Ecuador</option>
                                 <option value="EG">Egypt</option>
                                 <option value="SV">El Salvador</option>
                                 <option value="GQ">Equatorial Guinea</option>
                                 <option value="ER">Eritrea</option>
                                 <option value="EE">Estonia</option>
                                 <option value="ET">Ethiopia</option>
                                 <option value="FK">Falkland Islands (Malvinas)</option>
                                 <option value="FO">Faroe Islands</option>
                                 <option value="FJ">Fiji</option>
                                 <option value="FI">Finland</option>
                                 <option value="FR">France</option>
                                 <option value="GF">French Guiana</option>
                                 <option value="PF">French Polynesia</option>
                                 <option value="TF">French Southern Territories</option>
                                 <option value="GA">Gabon</option>
                                 <option value="GM">Gambia</option>
                                 <option value="GE">Georgia</option>
                                 <option value="DE">Germany</option>
                                 <option value="GH">Ghana</option>
                                 <option value="GI">Gibraltar</option>
                                 <option value="GR">Greece</option>
                                 <option value="GL">Greenland</option>
                                 <option value="GD">Grenada</option>
                                 <option value="GP">Guadeloupe</option>
                                 <option value="GU">Guam</option>
                                 <option value="GT">Guatemala</option>
                                 <option value="GG">Guernsey</option>
                                 <option value="GN">Guinea</option>
                                 <option value="GW">Guinea-Bissau</option>
                                 <option value="GY">Guyana</option>
                                 <option value="HT">Haiti</option>
                                 <option value="HM">Heard Island and McDonald Islands</option>
                                 <option value="VA">Holy See (Vatican City State)</option>
                                 <option value="HN">Honduras</option>
                                 <option value="HK">Hong Kong</option>
                                 <option value="HU">Hungary</option>
                                 <option value="IS">Iceland</option>
                                 <option value="IN">India</option>
                                 <option value="ID">Indonesia</option>
                                 <option value="IR">Iran, Islamic Republic of</option>
                                 <option value="IQ">Iraq</option>
                                 <option value="IE">Ireland</option>
                                 <option value="IM">Isle of Man</option>
                                 <option value="IL">Israel</option>
                                 <option value="IT">Italy</option>
                                 <option value="JM">Jamaica</option>
                                 <option value="JP">Japan</option>
                                 <option value="JE">Jersey</option>
                                 <option value="JO">Jordan</option>
                                 <option value="KZ">Kazakhstan</option>
                                 <option value="KE">Kenya</option>
                                 <option value="KI">Kiribati</option>
                                 <option value="KP">Korea, Democratic People's Republic of</option>
                                 <option value="KR">Korea, Republic of</option>
                                 <option value="KW">Kuwait</option>
                                 <option value="KG">Kyrgyzstan</option>
                                 <option value="LA">Lao People's Democratic Republic</option>
                                 <option value="LV">Latvia</option>
                                 <option value="LB">Lebanon</option>
                                 <option value="LS">Lesotho</option>
                                 <option value="LR">Liberia</option>
                                 <option value="LY">Libya</option>
                                 <option value="LI">Liechtenstein</option>
                                 <option value="LT">Lithuania</option>
                                 <option value="LU">Luxembourg</option>
                                 <option value="MO">Macao</option>
                                 <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                 <option value="MG">Madagascar</option>
                                 <option value="MW">Malawi</option>
                                 <option value="MY">Malaysia</option>
                                 <option value="MV">Maldives</option>
                                 <option value="ML">Mali</option>
                                 <option value="MT">Malta</option>
                                 <option value="MH">Marshall Islands</option>
                                 <option value="MQ">Martinique</option>
                                 <option value="MR">Mauritania</option>
                                 <option value="MU">Mauritius</option>
                                 <option value="YT">Mayotte</option>
                                 <option value="MX">Mexico</option>
                                 <option value="FM">Micronesia, Federated States of</option>
                                 <option value="MD">Moldova, Republic of</option>
                                 <option value="MC">Monaco</option>
                                 <option value="MN">Mongolia</option>
                                 <option value="ME">Montenegro</option>
                                 <option value="MS">Montserrat</option>
                                 <option value="MA">Morocco</option>
                                 <option value="MZ">Mozambique</option>
                                 <option value="MM">Myanmar</option>
                                 <option value="NA">Namibia</option>
                                 <option value="NR">Nauru</option>
                                 <option value="NP">Nepal</option>
                                 <option value="NL">Netherlands</option>
                                 <option value="NC">New Caledonia</option>
                                 <option value="NZ">New Zealand</option>
                                 <option value="NI">Nicaragua</option>
                                 <option value="NE">Niger</option>
                                 <option value="NG">Nigeria</option>
                                 <option value="NU">Niue</option>
                                 <option value="NF">Norfolk Island</option>
                                 <option value="MP">Northern Mariana Islands</option>
                                 <option value="NO">Norway</option>
                                 <option value="OM">Oman</option>
                                 <option value="PK">Pakistan</option>
                                 <option value="PW">Palau</option>
                                 <option value="PS">Palestinian Territory, Occupied</option>
                                 <option value="PA">Panama</option>
                                 <option value="PG">Papua New Guinea</option>
                                 <option value="PY">Paraguay</option>
                                 <option value="PE">Peru</option>
                                 <option value="PH">Philippines</option>
                                 <option value="PN">Pitcairn</option>
                                 <option value="PL">Poland</option>
                                 <option value="PT">Portugal</option>
                                 <option value="PR">Puerto Rico</option>
                                 <option value="QA">Qatar</option>
                                 <option value="RE">Réunion</option>
                                 <option value="RO">Romania</option>
                                 <option value="RU">Russian Federation</option>
                                 <option value="RW">Rwanda</option>
                                 <option value="BL">Saint Barthélemy</option>
                                 <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                 <option value="KN">Saint Kitts and Nevis</option>
                                 <option value="LC">Saint Lucia</option>
                                 <option value="MF">Saint Martin (French part)</option>
                                 <option value="PM">Saint Pierre and Miquelon</option>
                                 <option value="VC">Saint Vincent and the Grenadines</option>
                                 <option value="WS">Samoa</option>
                                 <option value="SM">San Marino</option>
                                 <option value="ST">Sao Tome and Principe</option>
                                 <option value="SA">Saudi Arabia</option>
                                 <option value="SN">Senegal</option>
                                 <option value="RS">Serbia</option>
                                 <option value="SC">Seychelles</option>
                                 <option value="SL">Sierra Leone</option>
                                 <option value="SG">Singapore</option>
                                 <option value="SX">Sint Maarten (Dutch part)</option>
                                 <option value="SK">Slovakia</option>
                                 <option value="SI">Slovenia</option>
                                 <option value="SB">Solomon Islands</option>
                                 <option value="SO">Somalia</option>
                                 <option value="ZA">South Africa</option>
                                 <option value="GS">South Georgia and the South Sandwich Islands</option>
                                 <option value="SS">South Sudan</option>
                                 <option value="ES">Spain</option>
                                 <option value="LK">Sri Lanka</option>
                                 <option value="SD">Sudan</option>
                                 <option value="SR">Suriname</option>
                                 <option value="SJ">Svalbard and Jan Mayen</option>
                                 <option value="SZ">Swaziland</option>
                                 <option value="SE">Sweden</option>
                                 <option value="CH">Switzerland</option>
                                 <option value="SY">Syrian Arab Republic</option>
                                 <option value="TW">Taiwan, Province of China</option>
                                 <option value="TJ">Tajikistan</option>
                                 <option value="TZ">Tanzania, United Republic of</option>
                                 <option value="TH">Thailand</option>
                                 <option value="TL">Timor-Leste</option>
                                 <option value="TG">Togo</option>
                                 <option value="TK">Tokelau</option>
                                 <option value="TO">Tonga</option>
                                 <option value="TT">Trinidad and Tobago</option>
                                 <option value="TN">Tunisia</option>
                                 <option value="TR">Turkey</option>
                                 <option value="TM">Turkmenistan</option>
                                 <option value="TC">Turks and Caicos Islands</option>
                                 <option value="TV">Tuvalu</option>
                                 <option value="UG">Uganda</option>
                                 <option value="UA">Ukraine</option>
                                 <option value="AE">United Arab Emirates</option>
                                 <option value="GB">United Kingdom</option>
                                 <option value="US">United States</option>
                                 <option value="UM">United States Minor Outlying Islands</option>
                                 <option value="UY">Uruguay</option>
                                 <option value="UZ">Uzbekistan</option>
                                 <option value="VU">Vanuatu</option>
                                 <option value="VE">Venezuela, Bolivarian Republic of</option>
                                 <option value="VN">Viet Nam</option>
                                 <option value="VG">Virgin Islands, British</option>
                                 <option value="VI">Virgin Islands, U.S.</option>
                                 <option value="WF">Wallis and Futuna</option>
                                 <option value="EH">Western Sahara</option>
                                 <option value="YE">Yemen</option>
                                 <option value="ZM">Zambia</option>
                                 <option value="ZW">Zimbabwe</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>     
            </form>
         </div>
         <div class="column is-12-mobile is-6-tablet is-4-widescreen">
            <div class="title"> Confirm your order</div>
            <div class="confirm-order">
               <div class="adv-type is-open banner">
                  <div class="top">
                     <div class="name">Boost Packages</div>
                     <div class="right">
                        <div><span class="days">1</span> packages</div>
                     </div>
                  </div>
                  <div class="bottom">
                     <table class="table is-fullwidth banner">
                        <thead>
                           <tr>
                              <th>Package</th>
                              <th>Boosts</th>
                              <th>Price</th>
                           </tr>
                        </thead>
                        <tbody class="dates">
                            <?php 
                                if(isset($package)){
                                    $pid = genID();
                                    $userid = $_SESSION['id'];
                                    if($package > 1){
                                      

                                       $escapedPackages = array_map('intval', $splitData);
                                       $inClause = implode(',', $escapedPackages);
                                      
                                       
                                       // Building the SQL query
                                       $sql = "SELECT * FROM boosts_list WHERE package IN ($inClause)";
                                       $res = executeQueryV2($sql, $mysqli);
                                       if(!empty($res)){
                                           //print_r($res);
                                           $otalboosts = 0;
                                           $otalprice = 0;
                                           foreach($res as $i => $row){
                                            $pac = $row['package'];
                                            $boosts = $row['boosts'];
                                            $bonus =$row['bonus'];
                                            $price =$row['price'];
                                            $tboosts = intval($boosts) + intval($bonus);
                                            $otalboosts =  intval($otalboosts) + intval($tboosts);
                                            $otalprice = intval($otalprice) + intval($price);
                                            echo "<tr>
                                                    <td>
                                                        <span class='tag gray'>x$boosts</span> <b>Boosts</b><br>
                                                        <span class='small'>+ $bonus Boosts</span>
                                                    </td>
                                                    <td>
                                                        <span class='tag'>x$tboosts</span>
                                                    </td>
                                                    <td>
                                                        $ $price
                                                    </td>
                                                </tr>";
                                           }
                                          

                                           $sql1 = "INSERT INTO `buy_boosts`(`package`,`totalboosts`,`totalprice`,`userid`, `pid`)
                                                                        VALUES('$inClause','$otalboosts','$otalprice', '$userid', '$pid' )";
                                            
                                            executeQueryV2($sql1, $mysqli);

                                        }
                                    }

                                    if($package == 1){

                                        $sql = "SELECT * FROM boosts_list where package = $data";
                                        $res = executeQueryV2($sql, $mysqli);
                                        if(!empty($res)){
                                            //print_r($res);
                                            $pac = $res[0]['package'];
                                            $boosts = $res[0]['boosts'];
                                            $bonus =$res[0]['bonus'];
                                            $price =$res[0]['price'];
                                            $tboosts = intval($boosts) + intval($bonus);
                                            $otalboosts =  $tboosts;
                                            $otalprice = $price;

                                            echo "<tr>
                                                    <td>
                                                        <span class='tag gray'>x$boosts</span> <b>Boosts</b><br>
                                                        <span class='small'>+ $bonus Boosts</span>
                                                    </td>
                                                    <td>
                                                        <span class='tag'>x$tboosts</span>
                                                    </td>
                                                    <td>
                                                        $ $price
                                                    </td>
                                                </tr>";

                                            $sql1 = "INSERT INTO `buy_boosts`(`package`,`totalboosts`,`totalprice`,`userid`, `pid`)
                                                VALUES('$data','$otalboosts','$otalprice', '$userid', '$pid')";
                    
                                            executeQueryV2($sql1, $mysqli);
                                        }

                                    }
                                }
                            ?>
                         
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="summary">
                  <table class="table is-fullwidth no-header">
                     <tbody>
                        <tr class="totals">
                           <td><b>Total Boosts</b></td>
                           <td class="right subtotal"><span class="tag">X<?php if(isset($otalboosts)){ echo $otalboosts; }else{ echo 0; } ?></span></td>
                        </tr>
                        <tr class="totals">
                           <td><b>Total Price</b></td>
                           <td class="right total-price">$ <span><?php if(isset($otalprice)){ echo $otalprice; }else{ echo 0; } ?></span></td>
                        </tr>
                     </tbody>
                  </table>
                  <div>
                     <div class="columns">
                       
                        <div class="column is-6">
                           <a id="payads" href="/pay.php" class="button is-success" for="submit-form" tabindex="0">Pay Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="columns">
        
      </div>
      <div class="need-help">
         Need help? <a class="button is-primary" target="_blank" href="https://t.me/duncancoinsniper"><img src="/assets/img/telegram-white.svg">Contact support</a>
      </div>
   </div>
</section>

      <?php include_once "./inc/footer.php"; ?>
      <script  src="/assets/jquery-3.7.0.min.js" ></script>
      <script defer src="/assets/script/main.js"></script>
      <script src="/assets/js/flipdown.min.js"></script>

<script>
    $(document).ready(function () {
        var flipdown = new FlipDown(1689410275, 'flipdown');
        flipdown.start();

        var flipdown2 = new FlipDown(1689410275, 'flipdown2');
        flipdown2.start();
       
    })
</script>
     
   </body>
</html>