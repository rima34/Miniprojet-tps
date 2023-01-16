<!-- Partie 1 : Formulaire d'envoi -->
<html>
<body>
<div style="width:700px; margin:0 auto;">
<!-- Partie 1 : Formulaire d'envoi' -->
<h3>TP Creer et consommer un service web Simple REST API en PHP</h3>
<form action="" method="POST">
<label>Enter ID:</label><br />
<input type="text" name="Id" placeholder="Enter ID" required/>
<br /><br />
<label>Enter date:</label><br />
<input type="Date" name="Date" placeholder="Enter Date" required/>
<br /><br />
<label for="appt-time">choisir une heure </label>
<input id="appt-time" type="time" name="Heure" step="2" placeholder="choisir une heure " required >
<br /><br />
<button type="submit" name="submit">Recuperer</button>
</form>
<?php
if ((isset($_POST['Id']) && $_POST['Id']!="") && (isset($_POST['Date']) && $_POST['Date']!="") && (isset($_POST['Heure']) && $_POST['Heure']!="")) {
$Id = $_POST['Id'];
$Date = $_POST['Date'];
$Heure = $_POST['Heure'];
$url = "http://localhost/service4.php?Id=".$Id."&Date=".$Date."&Heure=".$Heure;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
//echo  "resultat:".$result."--";
echo "<table>";
echo "<tr><td> Id:</td><td>$result->Id</td></tr>";
echo "<tr><td>CodeCapteur:</td><td>$result->CodeCapteur</td></tr>";
echo "<tr><td>Position:</td><td>$result->Position</td></tr>";
echo "<tr><td>Date:</td><td>$result->Date</td></tr>";
echo "<tr><td>Heure:</td><td>$result->Heure</td></tr>";
echo "<tr><td>ValeurCapture:</td><td>$result->ValeurCapteur</td></tr>";
echo "</table>";
}
?>

<br />
</div>
</body>
</html>