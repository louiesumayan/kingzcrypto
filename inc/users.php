<?php 
   if ($_SERVER["REQUEST_METHOD"] == "GET") {                        
      if(isset($_GET['tk']) && isset($_GET['del'])){
         $_token = $mysqli -> real_escape_string($_GET['tk']);
         $id = $mysqli -> real_escape_string($_GET['del']);
         if($_token != $_SESSION['_token']){
            die("Invalid Token");
        }else{
            $sql = "DELETE FROM user WHERE id = $id";

            if(executeQueryV2($sql, $mysqli)){
               $notif = "<div class='container'>
                           <div class='message promoted-boost-message' style='margin-top: 1rem;'>
                               <i class='fas fa-info-circle'></i> User Delete Successfully
                           </div>
                       </div>";
               
           }
        }
      }
   }

   if(isset($notif)){ echo $notif; };


?>
<div class="listings promoted">
   <div class="container containerless">
      <div class="container">
         <div class="promoted-header">
            <div>
               <h2>User Management</h2>
            </div>
            <div>
               <a class="promoted-text" href="">
               
               </a>
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
                        </div>
                        <div class="sticky-border"></div>
                     </div>
                  </th>
                  <th class="display-mobile">Badges</th>                 
                  <th class="display-mobile">
                     Actions
                  </th>

                  <th class="display-desktop has-text-centered">#</th>              
                  <th class="display-desktop"></th>
                  <th class="display-desktop">Name</th>
                  <th class="display-desktop">Badges</th>  
                  <th class="display-desktop">Action</th> 
               </tr>
            </thead>
            <tbody>
               <?php
                  $token = $_SESSION['_token'];
                  $suser = "SELECT id, name, email, auth FROM user";

                  $res = executeQueryV2($suser, $mysqli);

                  #print_r($res);

                  foreach( $res as $row){
                     $id = $row['id'];
                     $name = $row['name'];
                     $email = $row['email'];
                     $auth = $row['auth'];
                     if ($auth == ''){
                        $auth = "<i class='fas fa-info-circle'></i>Pending";  
                     }else{
                        $auth = "<i class='fas fa-shield-alt'></i>$auth";
                     }
                     echo "<tr data-listingid='47851'>
                              <td class='sticky-col display-mobile'>
                                 <div>
                                    <div class='flex'>
                                       <div class='index'>
                                          1                
                                       </div>                                      
                                       <div class='info'>
                                          <div class='listing-symbol'>
                                             $name
                                          </div>
                                          <div class='listing-name'>$email</div>
                                       </div>
                                    </div>
                                    <div class='sticky-border'></div>
                                 </div>
                              </td>
                              <td class='display-mobile ignore'>
                                 <div class='votes-col'>                                   
                                    <div class='has-buttons'>
                                       <button class='button is-primary  promoted-boost-btn'>
                                          Edit
                                       </button>
                                       <a href='' class='button is-secondary'>
                                          Delete
                                       </a>
                                    </div>
                                 </div>
                              </td>

                              <td class='has-wishlist ignore display-desktop has-text-centered'>
                                 <span>1</span>
                              </td>
                             
                              <td class='display-desktop cmccg'>
                              </td>
                              <td class='display-desktop'>
                                 <div class='listing-symbol'>
                                    $name
                                 </div>
                                 <div class='listing-name'>$email</div>
                              </td>
                              <td>
                                 <span class='tag audit'>
                                  $auth
                                 </span>
                              </td>
                              <td class='display-desktop ignore'>
                                 <a href='/dashboard/edit-user.php?id=$id&tk=$token' class='button is-primary  ' >
                                    Edit
                                 </a>
                                 <a href='/dashboard/user.php?del=$id&tk=$token' class='button is-secondary '>
                                    Delete
                                 </a>
                              </td>                            
                           </tr>";
                        }

               ?>




               
              
              
            </tbody>
         </table>
      </div>
   </div>
</div>