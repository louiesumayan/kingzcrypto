

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

                  $suser = "SELECT id, name, email, auth FROM user";

                  $res = executeQueryV2($suser, $mysqli);

                  #print_r($res);

                  foreach( $res as $row){
                     $id = $row['id'];
                     $name = $row['name'];
                     $email = $row['email'];
                     $auth = 'admin'; //$row['auth'];
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
                                 <i class='fas fa-shield-alt'></i> $auth
                                 </span>
                              </td>
                              <td class='display-desktop ignore'>
                                 <a href='/dashboard/edit-user.php?id=$id' class='button is-primary  ' >
                                    Edit
                                 </a>
                                 <a href='' class='button is-secondary '>
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