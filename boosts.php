<?php
// Initialize the session
session_start();
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
<section class="boosts">
        <div class="container">
            
                
            <h1>Purchase Boosts</h1>
            <p>Purchase boosts here to boost projects in the promoted section! The promoted section is ranked by the
                amount of boosts the project received. Boosts are added to your account, you can then spend them at any
                time you like by clicking the "Boost" button on a project in our Promoted section.</p>

            <hr>

            <div class="columns">
                <div class="column is-6">
                    <h2>1. Select Packages</h2>
                    <div class="boost-packages">
                        <div class="columns is-multiline is-mobile">
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="1" data-name="1 Boost" data-boosts="1" data-bonus="0" data-total="1" data-price="10">
                                        <div class="header">
                                            <p><span class="tag">x 1</span> Boost</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/V29rZ5DUXx9FIR2hgVxxrfOBl0vchnp4FVUUxldu.gif" alt="1 Boost" data-id="1">
                                            <p><span class="tag gray">x1</span>+0 Bonus</p>
                                            <p class="price">$ 10</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="2" data-name="6 Boosts" data-boosts="5" data-bonus="1" data-total="6" data-price="50">
                                        <div class="header">
                                            <p><span class="tag">x 6</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/Y7MLidWJkaoa9uI0ZO9NL1EDjJ9QkWuvT398lEVE.png" alt="6 Boosts" data-id="2">
                                            <p><span class="tag gray">x5</span>+1 Bonus</p>
                                            <p class="price">$ 50</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="3" data-name="12 Boosts" data-boosts="10" data-bonus="2" data-total="12" data-price="100">
                                        <div class="header">
                                            <p><span class="tag">x 12</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/y1zrc5jcr8JNmm3eM9TLaYYTocc3PyvYihEqxwVZ.png" alt="12 Boosts" data-id="3">
                                            <p><span class="tag gray">x10</span>+2 Bonus</p>
                                            <p class="price">$ 100</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="4" data-name="30 Boosts" data-boosts="25" data-bonus="5" data-total="30" data-price="250">
                                        <div class="header">
                                            <p><span class="tag">x 30</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/hZyfbmdPAevn3fcnO3qG9ZICBzHrJjdunyEaKpLw.png" alt="30 Boosts" data-id="4">
                                            <p><span class="tag gray">x25</span>+5 Bonus</p>
                                            <p class="price">$ 250</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="5" data-name="65 Boosts" data-boosts="50" data-bonus="15" data-total="65" data-price="500">
                                        <div class="header">
                                            <p><span class="tag">x 65</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/ZBngWxm3XqTgePOXrqX8IXW5YhtFNwYbX0dm5b8c.png" alt="65 Boosts" data-id="5">
                                            <p><span class="tag gray">x50</span>+15 Bonus</p>
                                            <p class="price">$ 500</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="6" data-name="140 Boosts" data-boosts="100" data-bonus="40" data-total="140" data-price="1000">
                                        <div class="header">
                                            <p><span class="tag">x 140</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/TZb9T35MLpU3S8DeqPlFfAKXMr5PzcYCmpi01BXG.png" alt="140 Boosts" data-id="6">
                                            <p><span class="tag gray">x100</span>+40 Bonus</p>
                                            <p class="price">$ 1,000</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="7" data-name="350 Boosts" data-boosts="250" data-bonus="100" data-total="350" data-price="2500">
                                        <div class="header">
                                            <p><span class="tag">x 350</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/vejAjmZaQ7MrUTeAq6ty5hdoAu0vbX0kJXISouj2.png" alt="350 Boosts" data-id="7">
                                            <p><span class="tag gray">x250</span>+100 Bonus</p>
                                            <p class="price">$ 2,500</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="8" data-name="750 Boosts" data-boosts="500" data-bonus="250" data-total="750" data-price="5000">
                                        <div class="header">
                                            <p><span class="tag">x 750</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/lhLkB7OXVEwyfUh5ZEcwEzIfG563f9j8EHdaMjIs.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/6KSFloyW3gIwdy21XFOZdrfHADUl1seWvhMfc4My.png" alt="750 Boosts" data-id="8">
                                            <p><span class="tag gray">x500</span>+250 Bonus</p>
                                            <p class="price">$ 5,000</p>
                                        </div>
                                    </div>
                                </div>
                                                            <div class="column is-4-tablet is-6-mobile">
                                    <div class="boost-package" data-id="9" data-name="1600 Boosts" data-boosts="1000" data-bonus="600" data-total="1600" data-price="10000">
                                        <div class="header">
                                            <p><span class="tag">x 1600</span> Boosts</p> <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="inner" style="background-image: url('https://storage.googleapis.com/coinsniper-assets/images/rUqc8rMM4eF5eDIz2JRjqyR4aHJgYnTdrkaaPGA8.png')">
                                            <img src="https://storage.googleapis.com/coinsniper-assets/images/E4RdPuHHh2yjgFqI9vgWkDvzoGABzXzzMhvC9B1W.gif" alt="1600 Boosts" data-id="9">
                                            <p><span class="tag gray">x1000</span>+600 Bonus</p>
                                            <p class="price">$ 10,000</p>
                                        </div>
                                    </div>
                                </div>
                                                    </div>
                    </div>
                </div>

                <div class="column is-4 is-offset-2">
                    <h2>2. Confirm Order</h2>

                    <form action="/boosts/buy" method="POST">
                        <input type="hidden" name="_token" value="1xq7yfiPysuC7SgZoIGc0HhnBOrxW5UyFSsd4zdz">
                        <div class="confirm-order">
                            <input type="hidden" name="packages">
                            <div class="header">
                                <p><b>Boost Package</b></p>
                                <p><span class="count">No</span> package<span class="s is-hidden">s</span> selected</p>
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
                                    <tr><td class="has-text-centered" colspan="6">Please select Boost package</td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="has-table">
                                <h3>Order Summary</h3>
                                <table class="table order-summary is-fullwidth">
                                    <tbody><tr>
                                        <th>Total Boosts</th>
                                        <td class="total-boosts"><span class="tag">x0</span></td>
                                    </tr>
                                    <tr>
                                        <th>Total Price</th>
                                        <td class="total-price">$ 0</td>
                                    </tr>
                                </tbody></table>
                            </div>

                            <div class="has-button">
                                <button type="submit" class="button is-primary" disabled="">
                                    Buy <span class="boost-amount"></span> Boosts
                                </button>
                            </div>


                            <div class="payment-methods">
                                <div>Payment methods:</div>
                                <div class="methods">
                                    <div>
                                        <img src="/assets/img/payments/btc.svg"> BTC
                                    </div>
                                    <div>
                                        <img src="/assets/img/payments/bnb.svg"> BNB
                                    </div>
                                    <div>
                                        <img src="/assets/img/payments/busd.svg"> BUSD
                                    </div>
                                    <div>
                                        <img src="/assets/img/payments/eth.svg"> ETH
                                    </div>
                                    <div>
                                        <img src="/assets/img/payments/usdt.svg"> USDT
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="columns">
    <div class="column is-12">
        <div class="faq">
            <h2>Frequently Asked Questions</h2>
                        <div class="item">
                <div class="question">
                    <div>
                        What are Boosts?
                    </div>
                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50595 5.8272C5.561 5.88049 5.63466 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z"></path>
                    </svg>
                </div>
                <div class="answer">
                    Boosts are used to rank the project in our promoted section. Anyone can buy Boosts to improve the ranking of a CoinSniper listing in the promoted section.
                </div>
            </div>
                        <div class="item">
                <div class="question">
                    <div>
                        Do Boosts last forever?
                    </div>
                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50595 5.8272C5.561 5.88049 5.63466 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z"></path>
                    </svg>
                </div>
                <div class="answer">
                    Listings do not lose Boosts once they receive them.
                </div>
            </div>
                        <div class="item">
                <div class="question">
                    <div>
                        Can I do anything else with Boosts?
                    </div>
                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50595 5.8272C5.561 5.88049 5.63466 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z"></path>
                    </svg>
                </div>
                <div class="answer">
                    For now, Boosts are only used for ranking the promoted section. Without a promoted spot, Boosts have no other utility for a listing.
                </div>
            </div>
                        <div class="item">
                <div class="question">
                    <div>
                        How can I buy Boosts, and what do they cost?
                    </div>
                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50595 5.8272C5.561 5.88049 5.63466 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z"></path>
                    </svg>
                </div>
                <div class="answer">
                    One boost costs $10. You get bonus boosts if you buy more packages. Prices are displayed above.
                </div>
            </div>
                        <div class="item">
                <div class="question">
                    <div>
                        How can I pay for Boosts?
                    </div>
                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.50595 5.8272C5.561 5.88049 5.63466 5.92407 5.72058 5.95417C5.8065 5.98427 5.90212 6 5.99919 6C6.09626 6 6.19187 5.98427 6.27779 5.95417C6.36372 5.92407 6.43738 5.88049 6.49243 5.8272L11.8928 0.627557C11.9554 0.567584 11.992 0.497339 11.9988 0.424453C12.0057 0.351568 11.9824 0.27883 11.9315 0.214143C11.8807 0.149456 11.8042 0.0952928 11.7105 0.0575393C11.6167 0.0197859 11.5092 -0.00011453 11.3996 4.95827e-07L0.598764 4.95827e-07C0.489461 0.000301439 0.38235 0.0204577 0.288948 0.0583016C0.195546 0.0961456 0.119388 0.150245 0.0686635 0.214783C0.0179391 0.279321 -0.00543232 0.351854 0.00106256 0.424584C0.00755745 0.497313 0.0436729 0.567486 0.105525 0.627557L5.50595 5.8272Z"></path>
                    </svg>
                </div>
                <div class="answer">
                    You can pay using BTC, ETH, BNB, BUSD and USDT. We support BTC, ERC20 en BEP20 networks.
                </div>
            </div>
                    </div>
    </div>
</div>

            <div class="need-help">
    Need help? <a class="button is-primary" target="_blank" href="https://t.me/duncancoinsniper"><img src="/assets/img/telegram-white.svg">Contact support</a>
</div>
        </div>
    </section>

    
  


  
  <?php include_once "./inc/footer.php"; ?>
  <script  src="./assets/jquery-3.7.0.min.js" ></script>
  <script defer src="./assets/script/main.js"></script>
  </body>
</html>
