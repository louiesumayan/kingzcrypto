


<div class="is-hidden-mobile">
    <div class="container">
      <div class="airdrop-home active-airdrop">
          <img src="/assets/img/moon.png" alt="">
            <div class="top">
              <div class="has-titles">
                <h2>BOOST <span></span></h2>
                <h3><?php if(isset($nboosts )){ if($nboosts == 0){ echo 'Sorry! you have no Boosts available buy come to boosts coin <a href="/boosts.php">Click Here</a>'; }else{ echo 'Hi there! Boosts this coin to make it on top'; } } ?> </h3>  

              </div>
              <div class="has-buttons is-hidden-mobile <?php if(isset($nboosts )){ if($nboosts == 0){ echo 'is-hidden'; } } ?>">                  
                  <button id="boostcoin" class="button  is-primary ">Boosts</button>
              </div>
              
            </div>
            <div class="bottom <?php if(isset($nboosts )){ if($nboosts == 0){ echo 'is-hidden'; } } ?>">
                      <div class="has-bar">
                          
                          <style>
                            .slidecontainer {
                            width: 100%; /* Width of the outside container */
                            }

                            /* The slider itself */
                            .slider {
                            -webkit-appearance: none;  /* Override default CSS styles */
                            appearance: none;
                            width: 100%; /* Full-width */
                            height: 50px; /* Specified height */
                            background: #d3d3d3; /* Grey background */
                            outline: none; /* Remove outline */
                            opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
                            -webkit-transition: .2s; /* 0.2 seconds transition on hover */
                            transition: opacity .2s;
                            }

                            /* Mouse-over effects */
                            .slider:hover {
                            opacity: 1; /* Fully shown on mouse-over */
                            }

                            /* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
                            .slider::-webkit-slider-thumb {
                            -webkit-appearance: none; /* Override default look */
                            appearance: none;
                            width: 25px; /* Set a specific slider handle width */
                            height: 25px; /* Slider handle height */
                            background: #04AA6D; /* Green background */
                            cursor: pointer; /* Cursor on hover */
                            }

                            .slider::-moz-range-thumb {
                            width: 25px; /* Set a specific slider handle width */
                            height: 25px; /* Slider handle height */
                            background: #04AA6D; /* Green background */
                            cursor: pointer; /* Cursor on hover */
                            }
                            .slider-pic {
                                -webkit-appearance: none;
                                width: 100%;
                                height: 5px;
                                border-radius: 50px;
                                background: #d3d3d3;
                                outline: none;
                                opacity:1;
                                -webkit-transition: opacity .15s ease-in-out;
                                transition: opacity .15s ease-in-out;
                            }
                            .slider-pic:hover {
                                opacity:1;
                            }
                            .slider-pic::-webkit-slider-thumb {
                                -webkit-appearance: none;
                                appearance: none;
                                width: 90px;
                                height: 50px;
                                border-radius: 100%;
                                background: url('/assets/img/airdrop-rocket.svg') no-repeat center/80%;                                
                                cursor: pointer;
                            }
                                .slider-pic::-moz-range-thumb {
                                width: 50px;
                                height: 50px;
                                border: 0;
                                border-radius: 50%;
                                background: url('/assets/img/airdrop-rocket.svg') no-repeat center/80%;
                                cursor: pointer;
                            }
                          </style>
                          <div class="slidecontainer">
                        <input type="range" min="1" max="<?php if(isset($nboosts )) { if($nboosts != '0' ){ echo $nboosts ; }else{ echo '0'; } } ?>" value="1" class="slider-pic" id="rocketslide">
                        </div>
                        <span id="f" style="font-weight:bold;color:red">1</span>
                      </div>
                      <div class="days ">
                      <?php
                        if (isset($nboosts)) {
                            if ($nboosts != "0") {   
                                $boosts = $nboosts;  

                                if($boosts <= '10'){
                                    for ($x = 1; $x <= $boosts; $x++) {
                                        if($x == 1){
                                            echo "<div class='day '>
                                                    <span> # $x Boosts</span>
                                                </div>";
                                        }else if($x == $boosts){
                                            echo "<div class='day '>
                                                <span> # $boosts Boosts</span>
                                            </div>";
                                        }else{
                                            echo " <div class='day '>
                                                    <span> $x</span>
                                                </div>";
                                        }
                                    }
                                }/*
                                if ($boosts <= 25) {
                                    for ($x = 1; $x <= $boosts; $x++) {
                                        if ($x == 1) {
                                            echo "<div class='day'>
                                                    <span># $x Boosts</span>
                                                  </div>";
                                        } else if ($x == $boosts) {
                                            echo "<div class='day'>
                                                    <span># $boosts Boosts</span>
                                                  </div>";
                                        } else {
                                            if ($x % 5 == 0) {
                                                echo "<div class='day'>
                                                        <span>$x</span>
                                                      </div>";
                                            }
                                        }
                                    }
                                }
                                /*
                                if ($boosts <= 100) {
                                    for ($x = 1; $x <= $boosts; $x++) {
                                        if ($x == 1) {
                                            echo "<div class='day'>
                                                    <span># $x Boosts</span>
                                                  </div>";
                                        } else if ($x == $boosts) {
                                            echo "<div class='day'>
                                                    <span># $boosts Boosts</span>
                                                  </div>";
                                        } else {
                                            if ($x % 10 == 0) {
                                                echo "<div class='day'>
                                                        <span>$x</span>
                                                      </div>";
                                            }
                                        }
                                    }
                                }
                                */
                                
                                
                               
                            }
                        }

                        ?>
                      </div>
                      <div class="days-mobile is-hidden-tablet">
                        <div class="day">Start: July 12th</div>
                      </div>

                      <div class="has-buttons is-hidden-tablet">
                          <a href="#" class="button join-button is-primary" data-airdropid="18" data-airdroptitle="Weekly Aidrop #17" data-airdropnetwork="bsc">Join Airdrop</a>
                          <a href="/airdrops" class="button is-primary is-gray">All Airdrops</a>
                      </div>
            </div>
        </div>
    </div>
  </div>
  <script>
   
   var slidePic = document.getElementById("rocketslide");
    var y = document.getElementById("f");

    slidePic.oninput = function() {
    y.innerHTML = this.value;
    };
</script>