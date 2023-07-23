<?php

   function process_data($data) {
      if (strpos($data, ', ') !== false) {
         $dataArray = explode(',', $data);
         $dataArray = array_map('trim', array_filter($dataArray));
         if (count($dataArray) === 1) {
            $data = trim($dataArray[0]);
         } else {
            $data = $dataArray;
         }
      } else {
         $data = trim($data);
      }

      return $data;
   }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      if( isset($_POST['token'])){
         $aflink = $mysqli->real_escape_string($_POST['aflink']);        
         $id = $_SESSION['id'];

      }
   
   }

   if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if(isset($_GET['rid'])){
         $id = $mysqli->real_escape_string($_GET['rid']);    
         $sql = "SELECT type FROM buy_ads WHERE pid = '$id'";
         $res = executeQueryV2($sql, $mysqli);
        // print_r($res);
         if(!empty($res)){
            $type =  $res[0]['type'];
          

            if(strpos($res[0]['type'], ',') !== false ){
               //echo 'has';
               $d = explode(',' , $type );
               $d = array_map('trim', array_filter($d));
               $cnt = count($d); 
               //print_r($d);
                          

               if($cnt > 1){
                  for ($i=1; $i < $cnt+1; $i++) {                      
                     switch ($d[$i]) {
                        case 'banner':
                           include "./inc/up/banner.php";
                           break;
                        case 'promoted':
                           include "./inc/up/promoted.php";
                           break;
                        case 'premium':
                           include "./inc/up/premium.php";
                           break;
                        case 'search':
                           include "./inc/up/search.php";
                           break;
                        
                        default:
                           # code...
                           break;
                     }
                  }
               }else if($cnt == 1){
                 
                  switch ($d[1]) {
                     case 'banner':
                        include "./inc/up/banner.php";
                        break;
                     case 'promoted':
                        include "./inc/up/promoted.php";
                        break;
                     case 'premium':
                        include "./inc/up/premium.php";
                        break;
                     case 'search':
                        include "./inc/up/search.php";
                        break;
                     
                     default:
                        # code...
                        break;
                  }
               }

               

            }
           
         }
      }else{
         header('Location: /');
         exit();
      }
   }

   ?>


