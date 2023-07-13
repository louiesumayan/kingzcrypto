
<section class="menu">
    <section class="topbar ">
    <div class="container">
        <div class="fade"></div>
        <div class="has-topbar">
            <div class="topbar-left">
                <div class="has-stat ">
                    BNB Price:<span class="stat">$243.44</span>
                </div>
                <div class="has-stat ">
                     Projects Listed:<span class="stat">48,207</span>
                </div>
                    <div class="has-stat ">
                    Total Votes:<span class="stat">199,965,215</span>
                </div>
                <div class="has-stat ">
                    Watchlists:<span class="stat">2,235,433</span>
                </div>
                
            </div>
            <div class="topbar-right is-hidden-mobile" <?php if(isset($_SESSION["loggedin"])){ echo 'style="display: none;"'; } ?> >
                <a href="/register.php">Register</a> / <a href="/login.php">Login</a>
            </div>
            <div class="topbar-right is-hidden-mobile" <?php if(!isset($_SESSION["loggedin"])){ echo 'style="display: none;"'; } ?>>
                <span><?php if(isset($_SESSION["name"])){ echo $_SESSION["name"]; } ?></span>
                <form action="" method="" class="logout">
                    <input type="hidden" name="_token" value="">                        
                    <a href="/logout.php">
                        Logout
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>
    <div class="container">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="overlay is-hidden"></div>
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                <img src="/assets/img/logo_header.png" alt="KINGZ" width="50px" />
                <img src="/assets/img/kingzhero.png"   alt="kingzhero" width="200px"  class="img__hero" />
                </a>

               
            </div>

            <div class="navbar-menu main-menu">
                <div class="navbar-start">
                    <div class="field has-search">
                        <div class="control has-icons-left">
                            <input class="input search search-icon hide-sm" type="text" placeholder="Search coins" id="search-bar-desktop">
                            <span class="icon is-small is-left">
                                <img src="/assets/img/search.svg">
                            </span>
                        </div>
                        <div class="results is-hidden">
                        </div>
                    </div>
                </div>

                <div class="navbar-end is-hidden-mobile">
                    <div class="buttons">
                        <a href="/boosts.php" class="button buy-boosts">
                            <span class="has-image"><img src="/assets/img/boost.svg" alt=""></span><span>x0</span>
                        </a>
                        <a class="button is-primary" href="/submit.php">
                            <strong> Submit Coin</strong>
                        </a>
                    </div>
                </div>

                <a class="nav-burger is-hidden-mobile">
                    <img src="/assets/img/burger.svg">
                </a>

                <div class="nav-mobile">
                    <a class="nav-search" href="#">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.5002 23.4999L18.2665 18.2569M21.1668 11.2499C21.1668 13.88 20.122 16.4023 18.2623 18.2621C16.4026 20.1218 13.8802 21.1666 11.2502 21.1666C8.6201 21.1666 6.09776 20.1218 4.23802 18.2621C2.37828 16.4023 1.3335 13.88 1.3335 11.2499C1.3335 8.61985 2.37828 6.09751 4.23802 4.23778C6.09776 2.37804 8.6201 1.33325 11.2502 1.33325C13.8802 1.33325 16.4026 2.37804 18.2623 4.23778C20.122 6.09751 21.1668 8.61985 21.1668 11.2499Z" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </a>
                    <a class="nav-burger">
                        <img src="/assets/img/burger.svg">
                    </a>
                </div>
            </div>
        </nav>
    </div>
</section>

<section class="mobile-menu">
    <img class="close" src="/assets/img/close-icon.svg">
    <div class="body">
        <div class="nav-label">Account</div>
        <ul class="nav">
            <li>
                <a href="/watchlist"><img src="/assets/img/watchlist.svg">Watchlist</a>
            </li>
            <li>
                <a href="/ads"><img src="/assets/img/speaker.svg">Ads</a>
            </li>
            <li>
                <a href="/boosts"><img src="/assets/img/boosticon.svg">Boosts</a>
            </li>
            <?php if(!isset($_SESSION["name"])){ ?>
            <li>
                <a href="/login">
                    <i class="fas fa-sign-in-alt"></i>Login
                </a>
            </li>
            <li>
                <a href="/register">
                    <i class="fas fa-user-plus"></i>Register
                </a>
            </li>
            <?php } ?>
         </ul>
        <div class="nav-label">Cryptocurrencies</div>
        <ul class="nav">
            <li>
                <a href="/"><img src="/assets/img/nwe_coin.png">New Coin</a>
            </li>
            <li>
                <a href="/alltime"><img src="/assets/img/Presale.png">Presales</a>
            </li>
            <li>
                <a href="/new"><img src="/assets/img/Hot.png">Hot coins</a>
            </li>           
        </ul>
        <div class="nav-label">Giveaway</div>
        <ul class="nav">
            <li>
                <a href="/submit"><img src="/assets/img/Airdrop.png">AirDrops - (TBA)</a>
            </li>           
        </ul>

        <div class="nav-label">Create</div>

        <ul class="nav">
            <li>
                <a href="/submit.php"><img src="/assets/img/Submit.png">Submit Coin</a>
            </li>
            <li>
                <a href="">
                    <img src="/assets/img/Submit.png">Update coin
                </a>
            </li>
            <li>
                <a href=""><img src="/assets/img/Update.png">Contact Us</a>
            </li>
           
        </ul>
        <div class="nav-label">News</div>
        <ul class="nav">
            <li>
                <a href="/submit.php"><img src="/assets/img/Blog.png">Blog</a>
            </li>
            
           
        </ul>
        <div class="nav-label">Services</div>
        <ul class="nav">
            <li>
                <a href="/submit.php"><img src="/assets/img/nwe_coin.png">Advertising</a>
            </li>
            <li>
                <a href="/submit.php"><img src="/assets/img/Presale.png">Promote</a>
            </li>
            <li>
                <a href="/submit.php"><img src="/assets/img/Hot.png">Partnership</a>
            </li>
            
           
        </ul>

        <div class="socials">
            <a href="" target="_blank">
                <span class="twitter">
                    <img src="/assets/img/Twitter.png">
                </span>
                <div>Follow us on twitter!</div>
            </a>
            
        </div>
    </div>
</section>