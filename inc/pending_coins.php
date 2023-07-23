<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
   if(isset($_GET['tk']) && isset($_GET['cid']) && isset($_GET['status'])){
      if($_GET['tk'] == $_SESSION['_token']){
         $tk = $mysqli -> real_escape_string($_GET['tk']);
         $cid = $mysqli -> real_escape_string($_GET['cid']);
         $status = $mysqli -> real_escape_string($_GET['status']);
         if($status == 'true'){
            //accept
            $sql = "UPDATE coins set status = 'approve' WHERE id = $cid";
            if(executeQueryV2($sql, $mysqli)){
               messagebox("Coins Successfully Approve");
            }
         }

         if($status == 'false'){
            //delete
            $sql = "DELETE FROM coins WHERE id = $cid";
            if(executeQueryV2($sql, $mysqli)){
               messagebox("Coins Successfully Delete");
            }

         }

      }
   }
}    


?>
<div class="listings promoted">
   <div class="container containerless">
      <div class="container">
         <div class="promoted-header">
            <div>
               <h2>Pending Coins</h2>
            </div>
            <div>
              
            </div>
         </div>
      </div>
     
      <div class="scrollable">
         <div class="can-scroll has-text-right is-hidden-tablet">
            <img src="/assets/img/table-move.svg" alt="">
         </div>
         <table class="table is-fullwidth" attr-table="promoted">
            <thead>
               <tr class="table-promoted">
                  <th class="display-mobile sticky-col">
                     <div>
                        <div class="flex padding-left">
                           <div class="index">#</div>
                           <div class="name">Coin</div>
                        </div>
                        <div class="sticky-border"></div>
                     </div>
                  </th>
                  <th class="display-mobile">
                     Action
                  </th>
                  <th class="display-desktop has-text-centered">#</th>
                  <th class="display-desktop">Coin</th>
                  <th class="display-desktop"></th>
                  <th class="display-desktop">Name</th>
                  <th>Badges</th>
                  <th>Chain</th>
                  <th>
                     <div class="sortable" attr-name="market_cap">
                        Market Cap
                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M3.67063 4.3848C3.70733 4.42033 3.75644 4.44938 3.81372 4.46945C3.871 4.48951 3.93475 4.5 3.99946 4.5C4.06417 4.5 4.12791 4.48951 4.1852 4.46945C4.24248 4.44938 4.29158 4.42033 4.32828 4.3848L7.92857 0.918371C7.97024 0.878389 7.99468 0.831559 7.99923 0.782969C8.00377 0.734379 7.98826 0.685887 7.95436 0.642762C7.92047 0.599637 7.86949 0.563529 7.80697 0.53836C7.74445 0.513191 7.67278 0.499924 7.59974 0.5L0.399176 0.5C0.326308 0.500201 0.2549 0.513638 0.192632 0.538868C0.130364 0.564097 0.079592 0.600164 0.0457757 0.643189C0.0119594 0.686214 -0.00362155 0.73457 0.000708374 0.783056C0.0050383 0.831542 0.0291153 0.878324 0.0703501 0.918371L3.67063 4.3848Z"></path>
                        </svg>
                     </div>
                  </th>
                  <th>
                     <div class="sortable" attr-name="price_usd">
                        Price
                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M3.67063 4.3848C3.70733 4.42033 3.75644 4.44938 3.81372 4.46945C3.871 4.48951 3.93475 4.5 3.99946 4.5C4.06417 4.5 4.12791 4.48951 4.1852 4.46945C4.24248 4.44938 4.29158 4.42033 4.32828 4.3848L7.92857 0.918371C7.97024 0.878389 7.99468 0.831559 7.99923 0.782969C8.00377 0.734379 7.98826 0.685887 7.95436 0.642762C7.92047 0.599637 7.86949 0.563529 7.80697 0.53836C7.74445 0.513191 7.67278 0.499924 7.59974 0.5L0.399176 0.5C0.326308 0.500201 0.2549 0.513638 0.192632 0.538868C0.130364 0.564097 0.079592 0.600164 0.0457757 0.643189C0.0119594 0.686214 -0.00362155 0.73457 0.000708374 0.783056C0.0050383 0.831542 0.0291153 0.878324 0.0703501 0.918371L3.67063 4.3848Z"></path>
                        </svg>
                     </div>
                  </th>
                  <th>
                     <div class="sortable" attr-name="price_change_24h">
                        Change 24h
                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M3.67063 4.3848C3.70733 4.42033 3.75644 4.44938 3.81372 4.46945C3.871 4.48951 3.93475 4.5 3.99946 4.5C4.06417 4.5 4.12791 4.48951 4.1852 4.46945C4.24248 4.44938 4.29158 4.42033 4.32828 4.3848L7.92857 0.918371C7.97024 0.878389 7.99468 0.831559 7.99923 0.782969C8.00377 0.734379 7.98826 0.685887 7.95436 0.642762C7.92047 0.599637 7.86949 0.563529 7.80697 0.53836C7.74445 0.513191 7.67278 0.499924 7.59974 0.5L0.399176 0.5C0.326308 0.500201 0.2549 0.513638 0.192632 0.538868C0.130364 0.564097 0.079592 0.600164 0.0457757 0.643189C0.0119594 0.686214 -0.00362155 0.73457 0.000708374 0.783056C0.0050383 0.831542 0.0291153 0.878324 0.0703501 0.918371L3.67063 4.3848Z"></path>
                        </svg>
                     </div>
                  </th>               
                  <th class="display-desktop">Action</th>
                  
               </tr>
            </thead>
            <tbody>
               
               <?php
               $token = $_SESSION['_token'];
               $sql = "SELECT * FROM coins WHERE status IS NULL;";

               $res = executeQueryV2($sql, $mysqli);
              
               if(!empty($res)){
                  foreach($res as $index => $row){
                     $id = $row['id'];
                     $photo = $row['image_url'];
                     $name = $row['name'];
                     $symbol = $row['symbol'];
                     $network = $row['network'];
                        if($network == 'bsc'){
                           $network = '<img src="/assets/img/bsc.png">BSC';
                        }else if($network == 'eth'){
                           $network = ' <img src="/assets/img/eth.png">ETH';
                        }
                     $presale = $row['presale'];
                     $softcap = $row['softcap'];
                     $cap_network =  strtoupper($row['cap_network']);
                        if($presale == ' YES'){
                           $presale = " <span class='presale'>
                                          <img src='/assets/img/presale.png'>
                                          Presale
                                       </span>";
                           $softcap  = "<div class='column-title'>Softcap</div><div>$softcap $cap_network</div>";
                           
                        }else{
                           $presale = "-";
                           if($cap_network != ''){
                              $softcap  = "<div class='column-title'>Softcap</div><div>$softcap $cap_network</div>";
                           }else{
                              $softcap  = '-';
                           }
                           
                        }
                     $hardcap = $row['hardcap'];
                        if($hardcap == ''){
                           $hardcap = '-';
                        }else{
                           $hardcap=  "<div class='column-title'>
                                       Hardcap
                                    </div>
                                    <div>
                                       $hardcap $cap_network
                                    </div>";
                        }
                     $boosts = number_format($row['boosts']);
                     $status = $row['status'];
                        if($status == 'approve'){
                           $acceptbtn = "<a href='' class='button is-info'>
                                             Edit
                                          </a>";
                        }else{
                           $acceptbtn = "<a href='/dashboard/coins.php?status=true&cid=$id&tk=$token' class='button is-info'>
                              Accept
                           </a>";
                        }

                     $actions = " $acceptbtn
                                 <a href='/dashboard/coins.php?status=false&cid=$id&tk=$token' class='button is-danger'>
                                    Delete
                                 </a>";
                     echo "<tr data-listingid='47851'>
                              <td class='sticky-col display-mobile'>
                                 <div>
                                    <div class='flex'>
                                       <div class='index'>
                                          $index                
                                       </div>
                                       <div class='img'>
                                          <img src='$photo'>
                                       </div>
                                       <div class='info'>
                                          <div class='listing-symbol'>
                                          $symbol
                                          </div>
                                          <div class='listing-name'> $name</div>
                                       </div>
                                    </div>
                                    <div class='sticky-border'></div>
                                 </div>
                              </td>
                             
                              <td class='has-wishlist ignore display-desktop has-text-centered'>
                                 <span>
                                 1        </span>
                              </td>
                              <td class='ignore display-desktop'>
                                 <div class='flex'>
                                    <img src='$photo'>
                                 </div>
                              </td>
                              <td class='display-desktop cmccg'>
                              </td>
                              <td class='display-desktop'>
                                 <div class='listing-symbol'>
                                    $symbol
                                 </div>
                                 <div class='listing-name'>$name</div>
                              </td>
                              <td class='display-desktop'>
                                 <span class='tag audit'>
                                 <i class='fas fa-info'></i> Pending
                                 </span>
                              </td>
                              <td class='display-mobile'>
                                $actions
                              </td>
                              <td>
                                 <span class='network'>                                
                                    $network
                                 </span>
                              </td>
                              <td>
                                $presale
                              </td>
                              <td>
                              $softcap 
                              </td>
                              <td> 
                                 -
                              </td >                                
                              
                              <td class='display-desktop'>
                                $actions
                              </td>
                              <td class='display-mobile'>
                              
                              </td>
                           </tr>";
                  }
               }
               
               
               ?>

            </tbody>
         </table>
      </div>
   </div>
</div>