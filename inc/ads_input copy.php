<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      if( isset($_POST['token'])){
         $aflink = $mysqli->real_escape_string($_POST['aflink']);        
         $id = $_SESSION['id'];

      }
   
   }

   if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if(isset($_GET['rid'])){
         $id = $mysqli->real_escape_string($_GET['rid']);    
         $sql = "SELECT * FROM buy_ads WHERE pid = '$id'";
         $res = executeQueryV2($sql, $mysqli);
         print_r($res);
      }
   }
   
   
   
   
   ?>
<div class="listings promoted">
   <div class="container containerless">
      <div class="container">
         <div class="promoted-header">
            <div>
               <h2>ADS PLACEMENT</h2>
            </div>
            <div>               
            </div>
         </div>
      </div>
      <div class="container">
               <div class="columns" style="padding-left: 10px; padding-right:10px">
                  <div class="column is-6 " >
                     <div class="presales-home">
                        <h2><span> </span></h2>
                        <div class="field">
                           <label class="label">Banner Top Left</label>
                           <div class="control">
                              <input name="aflink" class="input " type="file" placeholder="" >
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="column is-6 ">
                  <div class="presales-home">
                        <h2><span> </span></h2>
                        <div class="field">
                           <label class="label">Banner Top right</label>
                           <div class="control">
                              <input name="aflink" class="input " type="file" placeholder="" >
                           </div>
                        </div>
                     </div>
                  </div>                  
               </div>
               <div class="columns" style="padding-left: 10px; padding-right:10px">
                  <div class="column is-12 ">
                     <div class="presales-home">
                        <h2><span> </span></h2>
                        <div class="field">
                           <label class="label">Banner Top </label>
                           <div class="control">
                              <input name="aflink" class="input " type="file" placeholder="" >
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="columns" style="padding-left: 10px; padding-right:10px">
                  <div class="column is-12 ">
                     <div class="presales-home">
                        <h2><span> </span></h2>
                        <div class="field">
                           <label class="label">Banner Buttom</label>
                           <div class="control">
                              <input name="aflink" class="input " type="file" placeholder="" >
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="columns" style="padding-left: 10px; padding-right:10px">
                  <div class="column is-12 ">
                     <button class="button is-primary"> UPLOAD</button>
                  </div>
               </div>
      </div>
         

      <div class="scrollable">
         <div class="can-scroll has-text-right is-hidden-tablet">
            <img src="/assets/img/table-move.svg" alt="">
         </div>
         <style>
            .accform{
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 20px;
            }
         </style>
         <!-- main -->
        
         
           
         <!-- main -->
      </div>
   </div>
</div>