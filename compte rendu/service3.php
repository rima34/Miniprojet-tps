<?php
header("Content-Type:application/json");
if ((isset($_GET['CodeCapteur']) && $_GET['CodeCapteur']!="")&& (isset($_GET['Date']) && $_GET['Date']!="")){
include('db.php');
$CodeCapteur= $_GET['CodeCapteur'];
$Date = $_GET['Date'];


$result = mysqli_query($con,"SELECT * FROM `valeurscapteurs` WHERE `CodeCapteur`=$CodeCapteur AND `Date`='$Date'");



if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_array($result);
$Id = $row['Id'];
$CodeCapteur = $row['CodeCapteur'];
$Position = $row['Position'];
$Date = $row['Date'];
$Heure = $row['Heure'];
$ValeurCapture = $row['ValeurCapture'];
response($Id, $CodeCapteur, $Position,$Date,$Heure,$ValeurCapture);
mysqli_close($con);
}else{
response(NULL, NULL, 200,"No Record Found","","");
}
}else{
response(NULL, NULL, 400,"Invalid Request","","");
}
function response($Id, $CodeCapteur, $Position,$Date,$Heure,$ValeurCapture){
$response['Id'] = $Id;
$response['CodeCapteur'] = $CodeCapteur;
$response['Position'] = $Position;
$response['Date'] = $Date;
$response['Heure'] = $Heure;
$response['ValeurCapture'] = $ValeurCapture;
$json_response = json_encode($response);
echo $json_response;
}
?>