<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
    header("location: /login.php");
    exit;
}
// Include config file
require_once "./inc/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['_token'])){
        if($_POST['_token'] == $_SESSION['_token']){

            //print_r($_POST);

            // json_encode function 
            //$json_pretty = json_encode($_POST, JSON_PRETTY_PRINT);
            //echo "<pre>" . $json_pretty . "<pre/>";
            $user = $_SESSION['id'];
            $image_url = $mysqli -> real_escape_string($_POST['image_url']);
            $photo = $mysqli -> real_escape_string($_POST['photo']);
            $name = $mysqli -> real_escape_string($_POST['name']);
            $symbol=$mysqli -> real_escape_string($_POST['symbol']);
            $network=$mysqli -> real_escape_string($_POST['network']);
            $presale=$mysqli -> real_escape_string($_POST['presale']);
            $fairlaunch=$mysqli -> real_escape_string($_POST['fairlaunch']);
            $softcap=$mysqli -> real_escape_string($_POST['softcap']);
            $cap_network=$mysqli -> real_escape_string($_POST['cap_network']);
            $hardcap=$mysqli -> real_escape_string($_POST['hardcap']);
            $presale_start_day=$mysqli -> real_escape_string($_POST['presale_start_day']);
            $presale_start_month=$mysqli -> real_escape_string($_POST['presale_start_month']);
            $presale_start_year=$mysqli -> real_escape_string($_POST['presale_start_year']);
            $presale_end_day = $mysqli -> real_escape_string($_POST['presale_end_day']);
            $presale_end_month=$mysqli -> real_escape_string($_POST['presale_end_month']);
            $presale_end_year=$mysqli -> real_escape_string($_POST['presale_end_year']);
            $bsc_contract_address=$mysqli -> real_escape_string($_POST['bsc_contract_address']);
            $description=$mysqli -> real_escape_string($_POST['description']);
            $launch_date=$mysqli -> real_escape_string($_POST['launch_date']);
            if($launch_date == 'YES'){
                $date_created_day= $mysqli -> real_escape_string($_POST['date_created_day']);
                $date_created_month = $mysqli -> real_escape_string($_POST['date_created_month']);
                $date_created_year =  $mysqli -> real_escape_string($_POST['date_created_year']);
               
            }else{
                $date_created_day= '';
                $date_created_month ='';
                $date_created_year = '';
            }    
            $custom_dex_link=$mysqli -> real_escape_string($_POST['custom_dex_link']);
            $custom_swap_link=$mysqli -> real_escape_string($_POST['custom_swap_link']);
            $website_link=$mysqli -> real_escape_string($_POST['website_link']);
            $telegram_link=$mysqli -> real_escape_string($_POST['telegram_link']);
            $twitter_link=$mysqli -> real_escape_string($_POST['twitter_link']);
            $discord_link=$mysqli -> real_escape_string($_POST['discord_link']);
            $whitepaper_link=$mysqli -> real_escape_string($_POST['whitepaper_link']);
            $contact_email=$mysqli -> real_escape_string($_POST['contact_email']);
            $contact_telegram=$mysqli -> real_escape_string($_POST['contact_telegram']);
            $terms=$mysqli -> real_escape_string($_POST['terms']);


            $query = "INSERT INTO coins (image_url, photo, name, symbol, network, presale, fairlaunch, softcap, cap_network, hardcap, presale_start_day, presale_start_month, presale_start_year, presale_end_day, presale_end_month, presale_end_year, bsc_contract_address, description, launch_date, date_created_day, date_created_month, date_created_year, custom_dex_link, custom_swap_link, website_link, telegram_link, twitter_link, discord_link, whitepaper_link, contact_email, contact_telegram, terms, user)
            VALUES ('$image_url', '$photo', '$name', '$symbol', '$network', '$presale', '$fairlaunch', '$softcap', '$cap_network', '$hardcap', '$presale_start_day', '$presale_start_month', '$presale_start_year', '$presale_end_day', '$presale_end_month', '$presale_end_year', '$bsc_contract_address', '$description', '$launch_date', '$date_created_day', '$date_created_month', '$date_created_year', '$custom_dex_link', '$custom_swap_link', '$website_link', '$telegram_link', '$twitter_link', '$discord_link', '$whitepaper_link', '$contact_email', '$contact_telegram', '$terms', '$user')";
            
        
            
            
            if(executeQueryV2($query, $mysqli)){
                header('Location: /');
                exit();
            }
            



        }else{
            die("Invalid Token");
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
    <link rel="stylesheet" href="/assets/css/main.css" />
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
   
   
    <title>KINGZ CRYPTO</title>
  </head>
  <body>
  <?php     include_once "./inc/nav2.php";  ?>
  <?php  include_once "./inc/search.php";  ?>

  <section class="listing-form">
    <div class="container">
        <div class="wrapper">
            <div class="form">

                <div class="listing-form">
                    <h1>Submit new coin to CoinSniper</h1>
                    <p class="text-center">
                        Please fill out this form carefully to add a new coin to <a href="/">CoinSniper</a>. After submission, your
                        coin will be visible on the <a href="/listings/new" target="_blank">New Listings</a> page.
                        Get 500 votes to be officially listed on <a href="/">CoinSniper</a>.</p>
                       
                    
                    <form id="coins-form" action="/submit.php" method="POST">
                        <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                        <div class="step-1">
                            <div class="image-upload">
                                <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                                <input type="hidden" name="image_url" value="">
                                <div class="has-hidden-input">
                                    <input id="myId" name="photo" type="file" class="is-hidden">
                                </div>
                                <div class="field">
                                    <label class="label">Logo Upload*</label>
                                </div>
                                <div class="has-image" data-placeholder="https://coinsniper.net/assets/img/placeholder.jpg">
                                                                        <div class="logo-placeholder">
                                        <div class="has-text-centered">
                                            <svg width="43" height="42" viewBox="0 0 43 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.5 9C1.5 6.87827 2.34285 4.84344 3.84315 3.34315C5.34344 1.84285 7.37827 1 9.5 1H33.5C35.6217 1 37.6566 1.84285 39.1569 3.34315C40.6571 4.84344 41.5 6.87827 41.5 9V33C41.5 35.1217 40.6571 37.1566 39.1569 38.6569C37.6566 40.1571 35.6217 41 33.5 41H9.5C7.37827 41 5.34344 40.1571 3.84315 38.6569C2.34285 37.1566 1.5 35.1217 1.5 33V9Z" stroke="#787A8D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14.5 19C17.2614 19 19.5 16.7614 19.5 14C19.5 11.2386 17.2614 9 14.5 9C11.7386 9 9.5 11.2386 9.5 14C9.5 16.7614 11.7386 19 14.5 19Z" stroke="#787A8D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M26.552 22.2426L9.5 41.0006H33.766C35.8172 41.0006 37.7844 40.1858 39.2348 38.7354C40.6852 37.2849 41.5 35.3178 41.5 33.2666V33.0006C41.5 32.0686 41.15 31.7106 40.52 31.0206L32.46 22.2306C32.0844 21.8208 31.6274 21.4939 31.1183 21.2705C30.6093 21.0472 30.0592 20.9325 29.5034 20.9336C28.9475 20.9347 28.3979 21.0517 27.8897 21.2771C27.3816 21.5025 26.926 21.8313 26.552 22.2426V22.2426Z" stroke="#787A8D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            Click To<br>Upload Image
                                        </div>
                                    </div>
                                    
                                    <img src="" alt="" class="empty is-hidden">
                                </div>

                                <div class="save is-hidden">Save</div>
                                <div class="remove is-hidden">Delete</div>

                                <p class="error" style="display: none"></p>
                                <p class="message" style="display: none"></p>
                            </div>

                            <div class="field">
                                <label class="label">Name*</label>
                                <div class="control">
                                    <input name="name" class="input " type="text" placeholder="Bitcoin" required="" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Symbol*</label>
                                <div class="control">
                                    <input name="symbol" class="input " type="text" placeholder="BTC" required="" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Network/Chain</label>
                                <div class="select full-width">
                                    <select name="network">
                                        <option value="bsc" selected="">Binance Smart Chain (BSC)</option>
                                        <option value="eth">Ethereum
                                            (ETH)</option>
                                        <option value="arb">Arbitrum
                                            (ARB)</option>
                                        <option value="matic">
                                            Polygon (MATIC)</option>
                                        <option value="trx">Tron (TRX)
                                        </option>
                                        <option value="ftm">Fantom
                                            (FTM)</option>
                                        <option value="sol">Solana
                                            (SOL)</option>
                                        <option value="kcc">Kucoin
                                            Chain (KCC)</option>
                                        <option value="dogechain">Dogechain (DOGE)</option>
                                        <option value="other">Other
                                        </option>
                                    </select>
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Project in presale phase?*</label>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="presale" value="No" checked="">
                                        No
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="presale" value="Yes">
                                        Yes
                                    </label>
                                </div>
                            </div>

                            <div class="field is-fair-launch is-hidden">
                                <label class="label">Project is a Fair Launch?</label>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="fairlaunch" value="No" checked="">
                                        No
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="fairlaunch" value="Yes">
                                        Yes
                                    </label>
                                </div>
                            </div>

                            <div class="cap-options is-hidden">
                                <div class="columns is-desktop">
                                    <div class="column is-one-third-desktop">
                                        <div class="field soft-cap">
                                            <label class="label">Softcap (optional)</label>
                                            <div class="control">
                                                <div class="columns is-mobile">
                                                    <div class="column">
                                                        <input name="softcap" class="input " type="number" placeholder="100" value="">
                                                    </div>
                                                    <div class="column">
                                                        <div class="select">
                                                            <select name="cap_network">                                                                 
                                                                    <option title="ETH" value="eth">ETH</option>
                                                                 
                                                                    <option title="BNB" value="bnb">BNB</option>
                                                                 
                                                                    <option title="DOGE" value="dogechain">DOGE</option>
                                                                 
                                                                    <option title="ARB" value="arb">ARB</option>
                                                                 
                                                                    <option title="MATIC" value="matic">MATIC</option>
                                                                 
                                                                    <option title="TRX" value="trx">TRX</option>
                                                                 
                                                                    <option title="FTM" value="ftm">FTM</option>
                                                                 
                                                                    <option title="SOL" value="sol">SOL</option>
                                                                 
                                                                    <option title="KCC" value="kcc">KCC</option>
                                                                 
                                                                    <option title="Other" value="other">Other</option>
                                                                 
                                                                    <option title="USDT" value="usdt">USDT</option>
                                                                 
                                                                    <option title="BUSD" value="busd">BUSD</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-one-third-desktop">
                                        <div class="field soft-cap">
                                            <label class="label">Hardcap (optional)</label>
                                            <div class="control">
                                                <div class="columns is-mobile">
                                                    <div class="column">
                                                        <input name="hardcap" class="input " type="number" placeholder="200" value="">
                                                    </div>
                                                    <div class="column hardcap-wrapper">
                                                        <div id="hardcap-network">ETH</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                <p class="help">
                                    The softcap and the hardcap can be updated later.
                                </p>
                            </div>
                            
                            <div class="field presale-start-date is-hidden">
                                <label class="label">Presale Start Date*</label>
                                
                                <div class="control">
                                    <div class="control">
                                        <div class="select">
                                            <select name="presale_start_day">
                                                <option value="">Day</option>
                                                 <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>
                                                     <option value="6">6</option>
                                                     <option value="7">7</option>
                                                     <option value="8">8</option>
                                                     <option value="9">9</option>
                                                     <option value="10">10</option>
                                                     <option value="11">11</option>
                                                     <option value="12">12</option>
                                                     <option value="13">13</option>
                                                     <option value="14">14</option>
                                                     <option value="15">15</option>
                                                     <option value="16">16</option>
                                                     <option value="17">17</option>
                                                     <option value="18">18</option>
                                                     <option value="19">19</option>
                                                     <option value="20">20</option>
                                                     <option value="21">21</option>
                                                     <option value="22">22</option>
                                                     <option value="23">23</option>
                                                     <option value="24">24</option>
                                                     <option value="25">25</option>
                                                     <option value="26">26</option>
                                                     <option value="27">27</option>
                                                     <option value="28">28</option>
                                                     <option value="29">29</option>
                                                     <option value="30">30</option>
                                                     <option value="31">31</option>
                                                                                                </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_start_month">
                                                <option value="">Month</option>
                                                 <option value="1">January
                                                    </option>
                                                     <option value="2">February
                                                    </option>
                                                     <option value="3">March
                                                    </option>
                                                     <option value="4">April
                                                    </option>
                                                     <option value="5">May
                                                    </option>
                                                     <option value="6">June
                                                    </option>
                                                     <option value="7">July
                                                    </option>
                                                     <option value="8">August
                                                    </option>
                                                     <option value="9">September
                                                    </option>
                                                     <option value="10">October
                                                    </option>
                                                     <option value="11">November
                                                    </option>
                                                     <option value="12">December
                                                    </option>
                                                                                                </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_start_year">
                                                <option value="">Year</option>
                                                     
                                                        <option value="2018">
                                                            2018
                                                        </option>
                                                     
                                                        <option value="2019">
                                                            2019
                                                        </option>
                                                     
                                                        <option value="2020">
                                                            2020
                                                        </option>
                                                     
                                                        <option value="2021">
                                                            2021
                                                        </option>
                                                     
                                                        <option value="2022">
                                                            2022
                                                        </option>
                                                     
                                                        <option value="2023">
                                                            2023
                                                        </option>
                                                     
                                                        <option value="2024">
                                                            2024
                                                        </option>
                                                     
                                                        <option value="2025">
                                                            2025
                                                        </option>
                                                     
                                                        <option value="2026">
                                                            2026
                                                        </option>
                                                     
                                                        <option value="2027">
                                                            2027
                                                        </option>
                                                     
                                                        <option value="2028">
                                                            2028
                                                        </option>
                                                                                                </select>
                                        </div>
                                                                            </div>
                                </div>
                            </div>
                            <div class="field presale-end-date is-hidden">
                                <label class="label">Presale End Date</label>
                                <div class="control">
                                    <div class="control">
                                        <div class="select">
                                            <select name="presale_end_day">
                                                <option value="">Day</option>
                                                 <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>
                                                     <option value="6">6</option>
                                                     <option value="7">7</option>
                                                     <option value="8">8</option>
                                                     <option value="9">9</option>
                                                     <option value="10">10</option>
                                                     <option value="11">11</option>
                                                     <option value="12">12</option>
                                                     <option value="13">13</option>
                                                     <option value="14">14</option>
                                                     <option value="15">15</option>
                                                     <option value="16">16</option>
                                                     <option value="17">17</option>
                                                     <option value="18">18</option>
                                                     <option value="19">19</option>
                                                     <option value="20">20</option>
                                                     <option value="21">21</option>
                                                     <option value="22">22</option>
                                                     <option value="23">23</option>
                                                     <option value="24">24</option>
                                                     <option value="25">25</option>
                                                     <option value="26">26</option>
                                                     <option value="27">27</option>
                                                     <option value="28">28</option>
                                                     <option value="29">29</option>
                                                     <option value="30">30</option>
                                                     <option value="31">31</option>
                                                                                                </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_end_month">
                                                <option value="">Month</option>
                                                 <option value="1">January
                                                    </option>
                                                     <option value="2">February
                                                    </option>
                                                     <option value="3">March
                                                    </option>
                                                     <option value="4">April
                                                    </option>
                                                     <option value="5">May
                                                    </option>
                                                     <option value="6">June
                                                    </option>
                                                     <option value="7">July
                                                    </option>
                                                     <option value="8">August
                                                    </option>
                                                     <option value="9">September
                                                    </option>
                                                     <option value="10">October
                                                    </option>
                                                     <option value="11">November
                                                    </option>
                                                     <option value="12">December
                                                    </option>
                                                                                                </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_end_year">
                                                <option value="">Year</option>
                                                 
                                                    <option value="2023">
                                                        2023
                                                    </option>
                                                 
                                                    <option value="2024">
                                                        2024
                                                    </option>
                                                 
                                                    <option value="2025">
                                                        2025
                                                    </option>
                                                 
                                                    <option value="2026">
                                                        2026
                                                    </option>
                                                 
                                                    <option value="2027">
                                                        2027
                                                    </option>
                                                 
                                                    <option value="2028">
                                                        2028
                                                    </option>
                                                                                            </select>
                                        </div>
                                                                                                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label contract-address-label ">
                                    Contract Address*
                                </label>
                                <label class="label contract-address-label is-hidden">
                                    Contract Address (optional for presales)
                                </label>
                                <div class="control">
                                    <input name="bsc_contract_address" class="input " type="text" placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52" required="" value="">
                                </div>
                                
                                <p class="help presale is-hidden">Your contract address will be hidden until your presale is finished.</p>
                            </div>

                            <div class="field presale-link is-hidden">
                                <label class="label">Presale link (optional)</label>
                                <div class="control">
                                    <input name="presale_link" class="input " type="text" placeholder="https://dxsale.com/your-presale-link-here" value="" disabled="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Description*</label>
                                <div class="control">
                                    <textarea name="description" maxlength="1048" class="textarea " placeholder="Describe your coin here. What is the goal, plans, why is this coin unique?" required=""></textarea>
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Launch Date is known?*</label>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="launch_date" value="No" checked="">
                                        No
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="launch_date" value="Yes">
                                        Yes
                                    </label>
                                </div>
                            </div>
                            <div class="field launch-date is-hidden">
                                <label class="label">Launch Date*</label>
                                <div class="control">
                                    <div class="control">
                                        <div class="select">
                                            <select name="date_created_day" disabled="">
                                                <option value="">Day</option>
                                                 <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                     <option value="4">4</option>
                                                     <option value="5">5</option>
                                                     <option value="6">6</option>
                                                     <option value="7">7</option>
                                                     <option value="8">8</option>
                                                     <option value="9">9</option>
                                                     <option value="10">10</option>
                                                     <option value="11">11</option>
                                                     <option value="12">12</option>
                                                     <option value="13">13</option>
                                                     <option value="14">14</option>
                                                     <option value="15">15</option>
                                                     <option value="16">16</option>
                                                     <option value="17">17</option>
                                                     <option value="18">18</option>
                                                     <option value="19">19</option>
                                                     <option value="20">20</option>
                                                     <option value="21">21</option>
                                                     <option value="22">22</option>
                                                     <option value="23">23</option>
                                                     <option value="24">24</option>
                                                     <option value="25">25</option>
                                                     <option value="26">26</option>
                                                     <option value="27">27</option>
                                                     <option value="28">28</option>
                                                     <option value="29">29</option>
                                                     <option value="30">30</option>
                                                     <option value="31">31</option>
                                                                                                </select>
                                        </div>

                                        <div class="select">
                                            <select name="date_created_month" disabled="">
                                                <option value="">Month</option>
                                                 <option value="1">January
                                                    </option>
                                                     <option value="2">February
                                                    </option>
                                                     <option value="3">March
                                                    </option>
                                                     <option value="4">April
                                                    </option>
                                                     <option value="5">May
                                                    </option>
                                                     <option value="6">June
                                                    </option>
                                                     <option value="7">July
                                                    </option>
                                                     <option value="8">August
                                                    </option>
                                                     <option value="9">September
                                                    </option>
                                                     <option value="10">October
                                                    </option>
                                                     <option value="11">November
                                                    </option>
                                                     <option value="12">December
                                                    </option>
                                                                                                </select>
                                        </div>

                                        <div class="select">
                                            <select name="date_created_year" disabled="">
                                                <option value="">Year</option>
                                                 <option value="2024">2024
                                                    </option>
                                                     <option value="2023">2023
                                                    </option>
                                                     <option value="2022">2022
                                                    </option>
                                                     <option value="2021">2021
                                                    </option>
                                                     <option value="2020">2020
                                                    </option>
                                                     <option value="2019">2019
                                                    </option>
                                                     <option value="2018">2018
                                                    </option>
                                                     <option value="2017">2017
                                                    </option>
                                                     <option value="2016">2016
                                                    </option>
                                                     <option value="2015">2015
                                                    </option>
                                                                                                </select>
                                        </div>
                                                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-2">
                            <div class="field">
                                <label class="label">Custom chart link (optional)</label>
                                <div class="control">
                                    <input name="custom_dex_link" class="input " type="text" placeholder="https://dex.guru/token/0x...." value="">
                                </div>
                                                                <p class="help">By default, Poocoin (BSC) and Dextools (ETH) is used. Enter custom chart
                                    link here if you want to use it.</p>
                            </div>

                            <div class="field">
                                <label class="label">Custom swap link (optional)</label>
                                <div class="control">
                                    <input name="custom_swap_link" class="input " type="text" placeholder="https://apeswap.finance/..." value="">
                                </div>
                                                                <p class="help">By default, PancakeSwap v2 (BSC) and UniSwap (ETH) is used. Enter custom
                                    swap link here if you want to use it, like Apeswap.</p>
                            </div>

                            <div class="field">
                                <label class="label">Website link*</label>
                                <div class="control">
                                    <input name="website_link" class="input " type="text" placeholder="https://coinsniper.net" required="" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Telegram link*</label>
                                <div class="control">
                                    <input name="telegram_link" class="input " type="text" placeholder="https://t.me/coinsniper" required="" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Twitter link</label>
                                <div class="control">
                                    <input name="twitter_link" class="input " type="text" placeholder="https://twitter.com/coinsniper" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Discord link</label>
                                <div class="control">
                                    <input name="discord_link" class="input " type="text" placeholder="https://discord.gg/coinsniper" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Whitepaper link (optional)</label>
                                <div class="control">
                                    <input name="whitepaper_link" class="input " type="text" placeholder="https://coinsniper.net" value="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Contact Email*</label>
                                <div class="control">
                                    <input name="contact_email" class="input " type="text" placeholder="you@email.com" value="" required="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Contact Telegram*</label>
                                <div class="control">
                                    <input name="contact_telegram" class="input " type="text" placeholder="@YourTelegramUsername" value="" required="">
                                </div>
                                                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="terms" required="">
                                        I agree to the <a href="/terms-and-conditions" target="_blank">Terms and Conditions*</a>
                                    </label>
                                </div>
                            </div>

                           

                            <div class="text-center">
                                <a href="#" id="prev-step" class="button is-primary back">BACK</a>
                                <button type="submit" id="submit-coin" class="button is-primary">SUBMIT COIN</button>
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
  <script>
 $(document).ready(function() {

    $('#hardcap-network').html(
        $('select[name="cap_network"] option:selected').attr('title')
    );

    $('select[name="cap_network"]').change(function() {
        $('#hardcap-network').html(
            $('select[name="cap_network"] option:selected').attr('title')
        );
    });

    $('[name=presale]').click(function() {
        $('.is-fair-launch').toggleClass('is-hidden')
        $('.presale-start-date').toggleClass('is-hidden')
        $('.presale-end-date').toggleClass('is-hidden')
        $('.cap-options').toggleClass('is-hidden')
        $('.contract-address-label').toggleClass('is-hidden')
        $('.presale-link').toggleClass('is-hidden')
        $('[name=presale_link]').attr('disabled', $('[name=presale_link]').is(':disabled') ? false : true)
        $('[name=bsc_contract_address]').attr('required', $('[name=bsc_contract_address]').is(':required') ? false : true)
    })

    $('[name=launch_date]').click(function() {
        $('.launch-date').toggleClass('is-hidden')
        $('[name=date_created_day]').attr('disabled', $('[name=date_created_day]').is(':disabled') ? false : true).attr('required', $('[name=date_created_day]').is(':required') ? false : true);
        $('[name=date_created_month]').attr('disabled', $('[name=date_created_month]').is(':disabled') ? false : true).attr('required', $('[name=date_created_month]').is(':required') ? false : true);
        $('[name=date_created_year]').attr('disabled', $('[name=date_created_year]').is(':disabled') ? false : true).attr('required', $('[name=date_created_year]').is(':required') ? false : true);
    })

    if ($('input[name=presale]:checked').val() === 'Yes') {
        $('.is-fair-launch').removeClass('is-hidden')
        $('.presale-start-date').removeClass('is-hidden')
        $('.presale-end-date').removeClass('is-hidden')
        $('.cap-options').removeClass('is-hidden')
    } else {
        $('.is-fair-launch').addClass('is-hidden')
        $('.presale-start-date').addClass('is-hidden')
        $('.presale-end-date').addClass('is-hidden')
        $('.cap-options').addClass('is-hidden')
    }


    // Image upload
    $('.image-upload .has-image:not(.cropping)').click(function() {
        $('.image-upload .has-image').removeClass('is-new')
        if (!$('.image-upload .has-image').hasClass('cropping'))
            $('[name=photo]').click()
    })

    let error = $('.image-upload p.error')
    let message = $('.image-upload p.message')
    $('.has-hidden-input').on('change', '[name=photo]', function() {
        $(error).html('').hide()
        $(message).html('').hide()

        let file = this.files[0]
        console.log(file)
        if (file.size > 300000) {
            $(error).html('File size cannot exceed 300kb').show()
            return;
        }

        if (file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg") {
            $(error).html('File must be .png or .jpg').show()
            return;
        }

        var url = URL.createObjectURL(file);
        var img = new Image;

        img.onload = function() {
            if (img.width > 200 || img.height > 200) {
                $(error).html('File must be max 200x200 pixels').show()
                return;
            }
            if (img.width != img.height) {
                $(error).html('Image must be square (e.g. 150x150 pixels)').show()
                return;
            }

            var formData = new FormData();
            formData.append('_token', $('.image-upload [name=_token]').val())
            formData.append('file', file)
            //console.log(formData)

            $.ajax({
                url: '/upload/index.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false
            }).done(function(response) {
                //console.log("Success: Files sent!", response);

                $('[name=image_url]').val(response)
                $('.image-upload .save').addClass('is-hidden')
                $('.image-upload .has-image img.empty').attr('src', response).removeClass('is-hidden')
                $('.image-upload .has-hidden-input').html('<input name="photo" type="file" class="is-hidden" />')

            }).fail(function() {
                console.log("An error occurred, the files couldn't be sent!");
            });
        }

        img.src = url;
    })

    $('.image-upload .remove').click(function() {
        $(this).addClass('is-hidden')
        $('.image-upload img').attr('src', $('.image-upload .has-image').data('placeholder'))
        $('.image-upload [name=photo_url]').val(null)
    })
})
  </script>
  </body>
</html>
