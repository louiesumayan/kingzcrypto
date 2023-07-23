<?php
// Initialize the session
session_start();
define( 'ABSPATH', dirname( __FILE__, 2 ) . '/' );


// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
    header("location: /login.php");
    exit;
}
// Include config file
require_once ABSPATH."/inc/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['_token'])){
        if($_POST['_token'] == $_SESSION['_token']){

            //print_r($_POST);

            // json_encode function 
            //$json_pretty = json_encode($_POST, JSON_PRETTY_PRINT);
            //echo "<pre>" . $json_pretty . "<pre/>";
            $rid = $mysqli->real_escape_string($_POST['rid']);
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


            $query = "UPDATE coins SET 
            image_url = '$image_url',
            photo = '$photo',
            name = '$name',
            symbol = '$symbol',
            network = '$network',
            presale = '$presale',
            fairlaunch = '$fairlaunch',
            softcap = '$softcap',
            cap_network = '$cap_network',
            hardcap = '$hardcap',
            presale_start_day = '$presale_start_day',
            presale_start_month = '$presale_start_month',
            presale_start_year = '$presale_start_year',
            presale_end_day = '$presale_end_day',
            presale_end_month = '$presale_end_month',
            presale_end_year = '$presale_end_year',
            bsc_contract_address = '$bsc_contract_address',
            description = '$description',
            launch_date = '$launch_date',
            date_created_day = '$date_created_day',
            date_created_month = '$date_created_month',
            date_created_year = '$date_created_year',
            custom_dex_link = '$custom_dex_link',
            custom_swap_link = '$custom_swap_link',
            website_link = '$website_link',
            telegram_link = '$telegram_link',
            twitter_link = '$twitter_link',
            discord_link = '$discord_link',
            whitepaper_link = '$whitepaper_link',
            contact_email = '$contact_email',
            contact_telegram = '$contact_telegram',
            terms = '$terms'
          WHERE id = '$rid'";

         
            
            
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
  <?php     include_once ABSPATH."/inc/nav2.php";  ?>
  <?php  include_once ABSPATH."inc/search.php";  ?>

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
                       
                    <?php 
                    //get value
                    if($_SERVER["REQUEST_METHOD"] == "GET"){
                        // Check for valid token in URL parameter
                        if(isset($_GET['tk']) && isset($_GET['rid'])){
                            if($_GET['tk'] == $_SESSION['_token']){
                                $rid = $mysqli->real_escape_string($_GET['rid']);
                                $user = $_SESSION['id'];            
                    
                                $sql = "SELECT * FROM coins WHERE id = '$rid' AND user = '$user' ";
                                $res = executeQueryV2($sql, $mysqli);
                                //print_r($res[0]);
                            }       
                        }
                    }
                    ?>
                    <form id="coins-form" action="/dashboard/coin-edit.php" method="POST">
                        <input type="hidden" name="rid" <?php  if(isset($res)){ if(!empty($res)){ echo 'value="'.$res[0]['id'].'"'; } }  ?> >
                        <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                        <div class="step-1">
                            <div class="image-upload">
                                <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                                <input type="hidden" name="image_url" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['image_url']; } }  ?>">
                                <div class="has-hidden-input">
                                    <input id="myId" name="photo" type="file" class="is-hidden">
                                </div>
                                <div class="field">
                                    <label class="label">Logo Upload*</label>
                                </div>
                                <div class="has-image" data-placeholder="/assets/img/placeholder.jpg">
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
                                    
                                    <img src="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['image_url']; } }  ?>" alt="" class="empty">
                                </div>

                                <div class="save is-hidden">Save</div>
                                <div class="remove is-hidden">Delete</div>

                                <p class="error" style="display: none"></p>
                                <p class="message" style="display: none"></p>
                            </div>

                            <div class="field">
                                <label class="label">Name*</label>
                                <div class="control">
                                    <input name="name" class="input " type="text" placeholder="Bitcoin" required="" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['name']; } }  ?>">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Symbol*</label>
                                <div class="control">
                                    <input name="symbol" class="input " type="text" placeholder="BTC" required="" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['symbol']; } }  ?>">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Network/Chain</label>
                                <div class="select full-width">
                                    <select name="network" class="network">
                                        <option value="bsc" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'bsc'){ echo 'selected="selected"';}  } }   ?>  >Binance Smart Chain (BSC)</option>
                                        <option value="eth" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'eth'){ echo 'selected="selected"';}  } }   ?> >Ethereum  (ETH)</option>
                                        <option value="arb" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'arb'){ echo 'selected="selected"';}  } }   ?> >Arbitrum (ARB)</option>
                                        <option value="matic" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'matic'){ echo 'selected="selected"';}  } }   ?> > Polygon (MATIC)</option>
                                        <option value="trx" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'trx'){ echo 'selected="selected"';}  } }   ?> >Tron (TRX)  </option>
                                        <option value="ftm" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'ftm'){ echo 'selected="selected"';}  } }   ?> >Fantom (FTM)</option>
                                        <option value="sol" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'sol'){ echo 'selected="selected"';}  } }   ?> >Solana (SOL)</option>
                                        <option value="kcc" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'kcc'){ echo 'selected="selected"';}  } }   ?> >Kucoin  Chain (KCC)</option>
                                        <option value="dogechain" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'dogechain'){ echo 'selected="selected"';}  } }   ?> >Dogechain (DOGE)</option>
                                        <option value="other" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['network'] == 'other'){ echo 'selected="selected"';}  } }   ?> >Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Project in presale phase?*</label>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="presale" value="No" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale'] == 'No'){ echo 'checked=""'; } } }  ?> >
                                        No
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="presale" value="Yes" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale'] == 'Yes'){ echo 'checked=""'; } } }  ?> >
                                        Yes
                                    </label>
                                </div>
                            </div>

                            <div class="field is-fair-launch is-hidden">
                                <label class="label">Project is a Fair Launch?</label>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="fairlaunch" value="No" checked="" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['fairlaunch'] == 'No'){ echo 'checked=""'; } } }  ?> >
                                        No
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="fairlaunch" value="Yes" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['fairlaunch'] == 'Yes'){ echo 'checked=""'; } } }  ?> >
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
                                                        <input name="softcap" class="input " type="number" placeholder="100" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['softcap']; } }  ?>" >
                                                    </div>
                                                    <div class="column">
                                                        <div class="select">
                                                            <select name="cap_network" class="cap_network">                                                                 
                                                                    <option title="ETH" value="eth"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'eth'){ echo 'selected="selected"';}  } }   ?>  >ETH</option>
                                                                 
                                                                    <option title="BNB" value="bnb" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'bnb'){ echo 'selected="selected"';}  } }   ?> >BNB</option>
                                                                 
                                                                    <option title="DOGE" value="dogechain" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'dogechain'){ echo 'selected="selected"';}  } }   ?> >DOGE</option>
                                                                 
                                                                    <option title="ARB" value="arb" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'arb'){ echo 'selected="selected"';}  } }   ?> >ARB</option>
                                                                 
                                                                    <option title="MATIC" value="matic" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'matic'){ echo 'selected="selected"';}  } }   ?> >MATIC</option>
                                                                 
                                                                    <option title="TRX" value="trx" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'trx'){ echo 'selected="selected"';}  } }   ?> >TRX</option>
                                                                 
                                                                    <option title="FTM" value="ftm" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'ftm'){ echo 'selected="selected"';}  } }   ?> >FTM</option>
                                                                 
                                                                    <option title="SOL" value="sol" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'sol'){ echo 'selected="selected"';}  } }   ?> >SOL</option>
                                                                 
                                                                    <option title="KCC" value="kcc" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'kcc'){ echo 'selected="selected"';}  } }   ?> >KCC</option>
                                                                 
                                                                    <option title="Other" value="other" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'other'){ echo 'selected="selected"';}  } }   ?> >Other</option>
                                                                 
                                                                    <option title="USDT" value="usdt" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'usdt'){ echo 'selected="selected"';}  } }   ?> >USDT</option>
                                                                 
                                                                    <option title="BUSD" value="busd" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['cap_network'] == 'busd'){ echo 'selected="selected"';}  } }   ?> >BUSD</option>
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
                                                        <input name="hardcap" class="input " type="number" placeholder="200" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['hardcap']; } }  ?>">
                                                    </div>
                                                    <div class="column hardcap-wrapper">
                                                        <div id="hardcap-network"></div>
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
                                            <select name="presale_start_day" class="presale_start_day">
                                                <option value="">Day</option>
                                                 <option value="1" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '1'){ echo 'selected="selected"';}  } }   ?> >1</option>
                                                     <option value="2" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '2'){ echo 'selected="selected"';}  } }   ?> >2</option>
                                                     <option value="3" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '3'){ echo 'selected="selected"';}  } }   ?> >3</option>
                                                     <option value="4" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '4'){ echo 'selected="selected"';}  } }   ?>>4</option>
                                                     <option value="5" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '5'){ echo 'selected="selected"';}  } }   ?>>5</option>
                                                     <option value="6" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '6'){ echo 'selected="selected"';}  } }   ?>>6</option>
                                                     <option value="7" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '7'){ echo 'selected="selected"';}  } }   ?>>7</option>
                                                     <option value="8" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '8'){ echo 'selected="selected"';}  } }   ?>>8</option>
                                                     <option value="9" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '9'){ echo 'selected="selected"';}  } }   ?>>9</option>
                                                     <option value="10" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '10'){ echo 'selected="selected"';}  } }   ?>>10</option>
                                                     <option value="11" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '11'){ echo 'selected="selected"';}  } }   ?>>11</option>
                                                     <option value="12" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '12'){ echo 'selected="selected"';}  } }   ?>>12</option>
                                                     <option value="13" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '13'){ echo 'selected="selected"';}  } }   ?>>13</option>
                                                     <option value="14" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '14'){ echo 'selected="selected"';}  } }   ?>>14</option>
                                                     <option value="15" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '15'){ echo 'selected="selected"';}  } }   ?>>15</option>
                                                     <option value="16" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '16'){ echo 'selected="selected"';}  } }   ?>>16</option>
                                                     <option value="17" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '17'){ echo 'selected="selected"';}  } }   ?>>17</option>
                                                     <option value="18" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '18'){ echo 'selected="selected"';}  } }   ?>>18</option>
                                                     <option value="19" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '19'){ echo 'selected="selected"';}  } }   ?>>19</option>
                                                     <option value="20" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '20'){ echo 'selected="selected"';}  } }   ?>>20</option>
                                                     <option value="21" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '21'){ echo 'selected="selected"';}  } }   ?>>21</option>
                                                     <option value="22" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '22'){ echo 'selected="selected"';}  } }   ?>>22</option>
                                                     <option value="23" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '23'){ echo 'selected="selected"';}  } }   ?>>23</option>
                                                     <option value="24" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '24'){ echo 'selected="selected"';}  } }   ?>>24</option>
                                                     <option value="25" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '25'){ echo 'selected="selected"';}  } }   ?>>25</option>
                                                     <option value="26" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '26'){ echo 'selected="selected"';}  } }   ?>>26</option>
                                                     <option value="27" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '27'){ echo 'selected="selected"';}  } }   ?>>27</option>
                                                     <option value="28" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '28'){ echo 'selected="selected"';}  } }   ?>>28</option>
                                                     <option value="29" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '29'){ echo 'selected="selected"';}  } }   ?>>29</option>
                                                     <option value="30" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '30'){ echo 'selected="selected"';}  } }   ?>>30</option>
                                                     <option value="31" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_day'] == '31'){ echo 'selected="selected"';}  } }   ?>>31</option>
                                        </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_start_month" class="presale_start_month">
                                                    <option value="">Month</option>
                                                    <option value="1" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '1'){ echo 'selected="selected"';}  } } ?> >January
                                                    </option>
                                                     <option value="2"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2'){ echo 'selected="selected"';}  } } ?> >February
                                                    </option>
                                                     <option value="3"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '3'){ echo 'selected="selected"';}  } } ?> >March
                                                    </option>
                                                     <option value="4"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '4'){ echo 'selected="selected"';}  } } ?> >April
                                                    </option>
                                                     <option value="5"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '5'){ echo 'selected="selected"';}  } } ?> >May
                                                    </option>
                                                     <option value="6"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '6'){ echo 'selected="selected"';}  } } ?> >June
                                                    </option>
                                                     <option value="7"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '7'){ echo 'selected="selected"';}  } } ?> >July
                                                    </option>
                                                     <option value="8"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '8'){ echo 'selected="selected"';}  } } ?> >August
                                                    </option>
                                                     <option value="9"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '9'){ echo 'selected="selected"';}  } } ?> >September
                                                    </option>
                                                     <option value="10"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '10'){ echo 'selected="selected"';}  } } ?> >October
                                                    </option>
                                                     <option value="11"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '11'){ echo 'selected="selected"';}  } } ?> >November
                                                    </option>
                                                     <option value="12"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '12'){ echo 'selected="selected"';}  } } ?> >December
                                                    </option>
                                            </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_start_year" class="presale_start_year">
                                                <option value="">Year</option>
                                                <option value="2018"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2018'){ echo 'selected="selected"';}  } } ?> >
                                                    2018
                                                </option>
                                                <option value="2019"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2019'){ echo 'selected="selected"';}  } } ?> >
                                                    2019
                                                </option>
                                                <option value="2020"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2020'){ echo 'selected="selected"';}  } } ?> >
                                                    2020
                                                </option>
                                                <option value="2021"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2021'){ echo 'selected="selected"';}  } } ?> >
                                                    2021
                                                </option>
                                                <option value="2022"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2022'){ echo 'selected="selected"';}  } } ?> >
                                                    2022
                                                </option>
                                                <option value="2023"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2023'){ echo 'selected="selected"';}  } } ?> >
                                                    2023
                                                </option>
                                                <option value="2024"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2024'){ echo 'selected="selected"';}  } } ?> >
                                                    2024
                                                </option>
                                                <option value="2025"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2025'){ echo 'selected="selected"';}  } } ?> >
                                                    2025
                                                </option>
                                                <option value="2026"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2026'){ echo 'selected="selected"';}  } } ?> >
                                                    2026
                                                </option>
                                                <option value="2027"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2027'){ echo 'selected="selected"';}  } } ?> >
                                                    2027
                                                </option>
                                                <option value="2028"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_start_month'] == '2028'){ echo 'selected="selected"';}  } } ?> >
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
                                            <select name="presale_end_day" class="presale_end_day">
                                                    <option value="">Day</option>
                                                    <option value="1" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '1'){ echo 'selected="selected"';}  } }   ?> >1</option>
                                                     <option value="2" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '2'){ echo 'selected="selected"';}  } }   ?> >2</option>
                                                     <option value="3" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '3'){ echo 'selected="selected"';}  } }   ?> >3</option>
                                                     <option value="4" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '4'){ echo 'selected="selected"';}  } }   ?>>4</option>
                                                     <option value="5" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '5'){ echo 'selected="selected"';}  } }   ?>>5</option>
                                                     <option value="6" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '6'){ echo 'selected="selected"';}  } }   ?>>6</option>
                                                     <option value="7" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '7'){ echo 'selected="selected"';}  } }   ?>>7</option>
                                                     <option value="8" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '8'){ echo 'selected="selected"';}  } }   ?>>8</option>
                                                     <option value="9" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '9'){ echo 'selected="selected"';}  } }   ?>>9</option>
                                                     <option value="10" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '10'){ echo 'selected="selected"';}  } }   ?>>10</option>
                                                     <option value="11" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '11'){ echo 'selected="selected"';}  } }   ?>>11</option>
                                                     <option value="12" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '12'){ echo 'selected="selected"';}  } }   ?>>12</option>
                                                     <option value="13" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '13'){ echo 'selected="selected"';}  } }   ?>>13</option>
                                                     <option value="14" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '14'){ echo 'selected="selected"';}  } }   ?>>14</option>
                                                     <option value="15" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '15'){ echo 'selected="selected"';}  } }   ?>>15</option>
                                                     <option value="16" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '16'){ echo 'selected="selected"';}  } }   ?>>16</option>
                                                     <option value="17" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '17'){ echo 'selected="selected"';}  } }   ?>>17</option>
                                                     <option value="18" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '18'){ echo 'selected="selected"';}  } }   ?>>18</option>
                                                     <option value="19" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '19'){ echo 'selected="selected"';}  } }   ?>>19</option>
                                                     <option value="20" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '20'){ echo 'selected="selected"';}  } }   ?>>20</option>
                                                     <option value="21" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '21'){ echo 'selected="selected"';}  } }   ?>>21</option>
                                                     <option value="22" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '22'){ echo 'selected="selected"';}  } }   ?>>22</option>
                                                     <option value="23" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '23'){ echo 'selected="selected"';}  } }   ?>>23</option>
                                                     <option value="24" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '24'){ echo 'selected="selected"';}  } }   ?>>24</option>
                                                     <option value="25" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '25'){ echo 'selected="selected"';}  } }   ?>>25</option>
                                                     <option value="26" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '26'){ echo 'selected="selected"';}  } }   ?>>26</option>
                                                     <option value="27" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '27'){ echo 'selected="selected"';}  } }   ?>>27</option>
                                                     <option value="28" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '28'){ echo 'selected="selected"';}  } }   ?>>28</option>
                                                     <option value="29" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '29'){ echo 'selected="selected"';}  } }   ?>>29</option>
                                                     <option value="30" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '30'){ echo 'selected="selected"';}  } }   ?>>30</option>
                                                     <option value="31" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_day'] == '31'){ echo 'selected="selected"';}  } }   ?>>31</option>
                                            </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_end_month" class="presale_end_month">
                                            <option value="">Month</option>
                                                 <option value="1" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '1'){ echo 'selected="selected"';}  } } ?> >January
                                                    </option>
                                                     <option value="2"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '2'){ echo 'selected="selected"';}  } } ?> >February
                                                    </option>
                                                     <option value="3"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '3'){ echo 'selected="selected"';}  } } ?> >March
                                                    </option>
                                                     <option value="4"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '4'){ echo 'selected="selected"';}  } } ?> >April
                                                    </option>
                                                     <option value="5"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '5'){ echo 'selected="selected"';}  } } ?> >May
                                                    </option>
                                                     <option value="6"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '6'){ echo 'selected="selected"';}  } } ?> >June
                                                    </option>
                                                     <option value="7"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '7'){ echo 'selected="selected"';}  } } ?> >July
                                                    </option>
                                                     <option value="8"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '8'){ echo 'selected="selected"';}  } } ?> >August
                                                    </option>
                                                     <option value="9"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '9'){ echo 'selected="selected"';}  } } ?> >September
                                                    </option>
                                                     <option value="10"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '10'){ echo 'selected="selected"';}  } } ?> >October
                                                    </option>
                                                     <option value="11"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '11'){ echo 'selected="selected"';}  } } ?> >November
                                                    </option>
                                                     <option value="12"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_month'] == '12'){ echo 'selected="selected"';}  } } ?> >December
                                                    </option>
                                                 </select>
                                        </div>
                            
                                        <div class="select">
                                            <select name="presale_end_year" class="presale_end_year">
                                            <option value="">Year</option>
                                                <option value="2018"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2018'){ echo 'selected="selected"';}  } } ?> >
                                                    2018
                                                </option>
                                                <option value="2019"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2019'){ echo 'selected="selected"';}  } } ?> >
                                                    2019
                                                </option>
                                                <option value="2020"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2020'){ echo 'selected="selected"';}  } } ?> >
                                                    2020
                                                </option>
                                                <option value="2021"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2021'){ echo 'selected="selected"';}  } } ?> >
                                                    2021
                                                </option>
                                                <option value="2022"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2022'){ echo 'selected="selected"';}  } } ?> >
                                                    2022
                                                </option>
                                                <option value="2023"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2023'){ echo 'selected="selected"';}  } } ?> >
                                                    2023
                                                </option>
                                                <option value="2024"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2024'){ echo 'selected="selected"';}  } } ?> >
                                                    2024
                                                </option>
                                                <option value="2025"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2025'){ echo 'selected="selected"';}  } } ?> >
                                                    2025
                                                </option>
                                                <option value="2026"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2026'){ echo 'selected="selected"';}  } } ?> >
                                                    2026
                                                </option>
                                                <option value="2027"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2027'){ echo 'selected="selected"';}  } } ?> >
                                                    2027
                                                </option>
                                                <option value="2028"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['presale_end_year'] == '2028'){ echo 'selected="selected"';}  } } ?> >
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
                                    <input name="bsc_contract_address" class="input " type="text" placeholder="0xB8c77482e45F1F44dE1745F52C74426C631bDD52" required="" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['bsc_contract_address']; } }  ?>">
                                </div>
                                
                                <p class="help presale is-hidden">Your contract address will be hidden until your presale is finished.</p>
                            </div>

                            <div class="field presale-link is-hidden">
                                <label class="label">Presale link (optional)</label>
                                <div class="control">
                                    <input name="presale_link" class="input " type="text" placeholder="https://dxsale.com/your-presale-link-here" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['bsc_contract_address']; } }  ?> " disabled="">
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Description*</label>
                                <div class="control">
                                    <textarea name="description" maxlength="1048" class="textarea " placeholder="Describe your coin here. What is the goal, plans, why is this coin unique?" required=""><?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['description']; } }  ?></textarea>
                                </div>
                                                            </div>

                            <div class="field">
                                <label class="label">Launch Date is known?*</label>
                                <div class="control">
                                    <label class="radio">
                                        <input type="radio" name="launch_date" value="No" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['launch_date'] == 'No'){ echo 'checked=""'; } } }  ?> >
                                        No
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="launch_date" value="Yes" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['launch_date'] == 'Yes'){ echo 'checked=""'; } } }  ?> >
                                        Yes
                                    </label>
                                </div>
                            </div>
                            <div class="field launch-date is-hidden">
                                <label class="label">Launch Date*</label>
                                <div class="control">
                                    <div class="control">
                                        <div class="select">
                                            <select name="date_created_day" disabled="disabled">
                                                    <option value="">Day</option>
                                                    <option value="1" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '1'){ echo 'selected="selected"';}  } }   ?> >1</option>
                                                     <option value="2" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '2'){ echo 'selected="selected"';}  } }   ?> >2</option>
                                                     <option value="3" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '3'){ echo 'selected="selected"';}  } }   ?> >3</option>
                                                     <option value="4" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '4'){ echo 'selected="selected"';}  } }   ?>>4</option>
                                                     <option value="5" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '5'){ echo 'selected="selected"';}  } }   ?>>5</option>
                                                     <option value="6" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '6'){ echo 'selected="selected"';}  } }   ?>>6</option>
                                                     <option value="7" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '7'){ echo 'selected="selected"';}  } }   ?>>7</option>
                                                     <option value="8" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '8'){ echo 'selected="selected"';}  } }   ?>>8</option>
                                                     <option value="9" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '9'){ echo 'selected="selected"';}  } }   ?>>9</option>
                                                     <option value="10" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '10'){ echo 'selected="selected"';}  } }   ?>>10</option>
                                                     <option value="11" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '11'){ echo 'selected="selected"';}  } }   ?>>11</option>
                                                     <option value="12" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '12'){ echo 'selected="selected"';}  } }   ?>>12</option>
                                                     <option value="13" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '13'){ echo 'selected="selected"';}  } }   ?>>13</option>
                                                     <option value="14" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '14'){ echo 'selected="selected"';}  } }   ?>>14</option>
                                                     <option value="15" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '15'){ echo 'selected="selected"';}  } }   ?>>15</option>
                                                     <option value="16" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '16'){ echo 'selected="selected"';}  } }   ?>>16</option>
                                                     <option value="17" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '17'){ echo 'selected="selected"';}  } }   ?>>17</option>
                                                     <option value="18" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '18'){ echo 'selected="selected"';}  } }   ?>>18</option>
                                                     <option value="19" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '19'){ echo 'selected="selected"';}  } }   ?>>19</option>
                                                     <option value="20" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '20'){ echo 'selected="selected"';}  } }   ?>>20</option>
                                                     <option value="21" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '21'){ echo 'selected="selected"';}  } }   ?>>21</option>
                                                     <option value="22" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '22'){ echo 'selected="selected"';}  } }   ?>>22</option>
                                                     <option value="23" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '23'){ echo 'selected="selected"';}  } }   ?>>23</option>
                                                     <option value="24" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '24'){ echo 'selected="selected"';}  } }   ?>>24</option>
                                                     <option value="25" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '25'){ echo 'selected="selected"';}  } }   ?>>25</option>
                                                     <option value="26" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '26'){ echo 'selected="selected"';}  } }   ?>>26</option>
                                                     <option value="27" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '27'){ echo 'selected="selected"';}  } }   ?>>27</option>
                                                     <option value="28" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '28'){ echo 'selected="selected"';}  } }   ?>>28</option>
                                                     <option value="29" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '29'){ echo 'selected="selected"';}  } }   ?>>29</option>
                                                     <option value="30" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '30'){ echo 'selected="selected"';}  } }   ?>>30</option>
                                                     <option value="31" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_day'] == '31'){ echo 'selected="selected"';}  } }   ?>>31</option>
                                                </select>
                                        </div>

                                        <div class="select">
                                            <select name="date_created_month"  disabled="disabled">                                               
													<option value="">Month</option>
                                                    <option value="1" <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '1'){ echo 'selected="selected"';}  } } ?> >January
                                                    </option>
                                                     <option value="2"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '2'){ echo 'selected="selected"';}  } } ?> >February
                                                    </option>
                                                     <option value="3"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '3'){ echo 'selected="selected"';}  } } ?> >March
                                                    </option>
                                                     <option value="4"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '4'){ echo 'selected="selected"';}  } } ?> >April
                                                    </option>
                                                     <option value="5"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '5'){ echo 'selected="selected"';}  } } ?> >May
                                                    </option>
                                                     <option value="6"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '6'){ echo 'selected="selected"';}  } } ?> >June
                                                    </option>
                                                     <option value="7"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '7'){ echo 'selected="selected"';}  } } ?> >July
                                                    </option>
                                                     <option value="8"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '8'){ echo 'selected="selected"';}  } } ?> >August
                                                    </option>
                                                     <option value="9"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '9'){ echo 'selected="selected"';}  } } ?> >September
                                                    </option>
                                                     <option value="10"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '10'){ echo 'selected="selected"';}  } } ?> >October
                                                    </option>
                                                     <option value="11"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '11'){ echo 'selected="selected"';}  } } ?> >November
                                                    </option>
                                                     <option value="12"  <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_month'] == '12'){ echo 'selected="selected"';}  } } ?> >December
                                                    </option>
                                                </select>
                                        </div>

                                        <div class="select">
                                            <select name="date_created_year"  disabled="disabled">
                                                <option value="">Year</option>
                                                <option value="2018"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2018'){ echo 'selected="selected"';}  } } ?> >
                                                    2018
                                                </option>
                                                <option value="2019"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2019'){ echo 'selected="selected"';}  } } ?> >
                                                    2019
                                                </option>
                                                <option value="2020"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2020'){ echo 'selected="selected"';}  } } ?> >
                                                    2020
                                                </option>
                                                <option value="2021"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2021'){ echo 'selected="selected"';}  } } ?> >
                                                    2021
                                                </option>
                                                <option value="2022"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2022'){ echo 'selected="selected"';}  } } ?> >
                                                    2022
                                                </option>
                                                <option value="2023"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2023'){ echo 'selected="selected"';}  } } ?> >
                                                    2023
                                                </option>
                                                <option value="2024"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2024'){ echo 'selected="selected"';}  } } ?> >
                                                    2024
                                                </option>
                                                <option value="2025"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2025'){ echo 'selected="selected"';}  } } ?> >
                                                    2025
                                                </option>
                                                <option value="2026"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2026'){ echo 'selected="selected"';}  } } ?> >
                                                    2026
                                                </option>
                                                <option value="2027"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2027'){ echo 'selected="selected"';}  } } ?> >
                                                    2027
                                                </option>
                                                <option value="2028"   <?php  if(isset($res)){ if(!empty($res)){ if($res[0]['date_created_year'] == '2028'){ echo 'selected="selected"';}  } } ?> >
                                                    2028
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
                                    <input name="custom_dex_link" class="input " type="text" placeholder="https://dex.guru/token/0x...." value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['custom_dex_link']; } }  ?>">
                                </div>
                                <p class="help">By default, Poocoin (BSC) and Dextools (ETH) is used. Enter custom chart
                                    link here if you want to use it.
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Custom swap link (optional)</label>
                                <div class="control">
                                    <input name="custom_swap_link" class="input " type="text" placeholder="https://apeswap.finance/..." value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['custom_swap_link']; } }  ?>">
                                </div>
                                <p class="help">By default, PancakeSwap v2 (BSC) and UniSwap (ETH) is used. Enter custom
                                    swap link here if you want to use it, like Apeswap.
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Website link*</label>
                                <div class="control">
                                    <input name="website_link" class="input " type="text" placeholder="https://coinsniper.net" required="" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['website_link']; } }  ?>">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Telegram link*</label>
                                <div class="control">
                                    <input name="telegram_link" class="input " type="text" placeholder="https://t.me/coinsniper" required="" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['telegram_link']; } }  ?>">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Twitter link</label>
                                <div class="control">
                                    <input name="twitter_link" class="input " type="text" placeholder="https://twitter.com/coinsniper" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['twitter_link']; } }  ?>">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Discord link</label>
                                <div class="control">
                                    <input name="discord_link" class="input " type="text" placeholder="https://discord.gg/coinsniper" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['discord_link']; } }  ?>">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Whitepaper link (optional)</label>
                                <div class="control">
                                    <input name="whitepaper_link" class="input " type="text" placeholder="https://coinsniper.net" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['whitepaper_link']; } }  ?>">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Contact Email*</label>
                                <div class="control">
                                    <input name="contact_email" class="input " type="text" placeholder="you@email.com" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['contact_email']; } }  ?>" required="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Contact Telegram*</label>
                                <div class="control">
                                    <input name="contact_telegram" class="input " type="text" placeholder="@YourTelegramUsername" value="<?php  if(isset($res)){ if(!empty($res)){ echo $res[0]['contact_telegram']; } }  ?>" required="">
                                </div>
                            </div>                         
                            <div class="text-center">
                                <a href="#" id="prev-step" class="button is-primary back">BACK</a>
                                <button type="submit" id="submit-coin" class="button is-primary">UPDATE COIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    
  
  
  <?php include_once ABSPATH."/inc/footer.php"; ?>
  <script  src="/assets/jquery-3.7.0.min.js" ></script>
  <script defer src="/assets/script/main.js"></script>
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
