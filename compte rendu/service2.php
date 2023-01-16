<?php
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") {
  include('db.php');
$Id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM `valeurscapteurs` WHERE id=$Id");
if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_array($result);
$CodeCapteur = $row['CodeCapteur'];
$Position = $row['Position'];
$Date = $row['Date'];
$Heure = $row['Heure'];
$ValeurCapture = $row['ValeurCapture'];
response($Id,$CodeCapteur,$Position,$Date,$Heure,$ValeurCapture);
mysqli_close($con);
}else{
response(NULL, NULL, 200,"No Record Found","","");
}
}else{
response(NULL, NULL, 400,"Invalid Request","","");
}
function response($Id,$CodeCapteur,$Position,$Date,$Heure,$ValeurCapture){
$response['id'] = $Id;
$response['val1'] = $CodeCapteur;
$response['val2'] = $Position;
$response['val3'] = $Date;
$response['val4'] = $Heure;
$response['val5'] = $ValeurCapture;
$json_response = json_encode($response);
echo $json_response;
}
?>