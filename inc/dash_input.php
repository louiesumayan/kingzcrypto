<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   //Array ( [token] => 90b2b7089fc24b8492e232e407d9dc4b [aflink] => http://localhost/dashboard/ [eaddress] => 0x000000000000000000000000000000000000000000000 [network] => BN2 )
  
   if(isset($_POST['dash']) && isset($_POST['token'])){
      $aflink = $mysqli->real_escape_string($_POST['aflink']);
      $eaddress = $mysqli->real_escape_string($_POST['eaddress']);
      $network = $mysqli->real_escape_string($_POST['network']);
      $id = $_SESSION['id'];

      $sql = "UPDATE user SET `aflink` = '$aflink', `eaddress`='$eaddress', `network`='$network' WHERE id = '$id'";
      if(executeQueryV2($sql, $mysqli)){
         //echo "<script type='text/javascript'>alert('Updated successfully!');window.location='/account' </a>";
         //echo 'lol';
      }
   }

}

//get value
$uid = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = '$uid'";
$val = executeQueryV2($sql, $mysqli);
if(!empty($val)){
   $hasval = true;
}



?>
<div class="listings promoted">
   <div class="container containerless">
      <div class="container">
         <div class="promoted-header">
            <div>
               <h2>Account</h2>
            </div>
            <div>
              
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
         <form action="/dashboard/dash.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $_SESSION['_token']; ?>">
            <input type="hidden" name="dash" value="input">
            <div class="accform" >
               <div class="step-1">
                  <div class="field">
                     <label class="label">Affiliate link</label>
                     <div class="control">
                        <input name="aflink" class="input " type="text" placeholder="" value="<?php if(isset($hasval)){ echo $val[0]['aflink']; }  ?>">
                     </div>
                  </div>
                  <div class="field">
                     <label class="label">My Address</label>
                     <div class="control">
                        <input name="eaddress" class="input " type="text" placeholder=""  value="<?php if(isset($hasval)){ echo $val[0]['eaddress']; }  ?>">
                     </div>
                  </div>
                  <div class="field">
                     <label class="label">Network</label>
                     <div class="control">
                        <input name="network" class="input " type="text" placeholder=""  value="<?php if(isset($hasval)){ echo $val[0]['network']; }  ?>">
                     </div>
                  </div>
                  <div class="field">
                     <div class="control">
                        <button type="submit" class="button is-primary">SAVE</button>
                     </div>                  
                  </div>
               </div>
            </div>
         </form>

         <!-- main -->
        
      </div>
   </div>
</div>