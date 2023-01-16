<?php 
header("Content-Type:application/json"); 
if (isset($_GET['Id']) && $_GET['Id']!="")
 { include('db.php'); 
  $Id = $_GET['Id'];
  $result = mysqli_query($con,"SELECT * FROM valeurscapteurs WHERE Id=$Id");
   if(mysqli_num_rows($result)>0){ $row = mysqli_fetch_array($result); 
   $CodeCapteur = $row['CodeCapteur']; 
   $Position = $row['Position'];
    $Date = $row['Date']; 
    $Heure = $row['Heure']; 
    $ValeurCapture = $row['ValeurCapture']; 
    response($CodeCapteur, $Position, $Date, $Heure, $ValeurCapture);
     mysqli_close($con); 
     }else
     { response(NULL, NULL,NULL,200,"No Record Found"); } }
     else{
         response(NULL, NULL,NULL ,400,"Invalid Request"); } 
         function response($CodeCapteur,$Position,$Date,$Heure,$ValeurCapture)
         { 
         $response['CodeCapteur'] = $CodeCapteur; 
         $response['Position'] = $Position;
          $response['Date'] = $Date;
          $response['Heure'] = $Heure;
          $response['ValeurCapture'] = $ValeurCapture;
           $json_response = json_encode($response);
            echo $json_response;
             } ?>