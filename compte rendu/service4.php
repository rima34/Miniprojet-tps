<?php
header("Content-Type:application/json");
if ((isset($_GET['Id']) && $_GET['Id']!="")&& (isset($_GET['Date']) && $_GET['Date']!="") && (isset($_GET['Heure']) && $_GET['Heure']!="")){
include('db.php');
$Id = $_GET['Id'];
$Date = $_GET['Date'];
$Heure = $_GET['Heure'];

$result = mysqli_query($con,"SELECT * FROM `valeurscapteurs` WHERE `Id`=$Id AND `Date`=\"".$Date."\""); //"\" AND `Heure`=\"".$Heure."\"");
if(mysqli_num_rows($result)>0){
$row = mysqli_fetch_array($result);
//echo $row;
//$Id = $row['Id'];
$CodeCapteur = $row['CodeCapteur'];
$Position = $row['Position'];
$Date = $row['Date'];
$Heure = $row['Heure'];
$ValeurCapture = $row['ValeurCapture'];
response($Id,$CodeCapteur,$Position,$Date,$Heure,$ValeurCapture);
mysqli_close($con);
}else{
response(NULL, NULL, 200,"No Record Found",0,0);
}
}else{
response(NULL, NULL, 400,"Invalid Request",0,0);
}
function response($Id,$CodeCapture,$Position,$Date,$Heure,$ValeurCapture){
$response['Id'] = $Id;
$response['ValeurCapteur'] = $ValeurCapture;
$response['Position'] = $Position;
$response['Date'] = $Date;
$response['Heure'] = $Heure;
$response['CodeCapteur'] = $CodeCapture;
$json_response = json_encode($response);
echo $json_response;
}
?>