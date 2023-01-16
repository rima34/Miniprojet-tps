<!-- Partie 1 : Formulaire d'envoi -->
<html>
<body>
<div style="width:700px; margin:0 auto;">
<!-- Partie 1 : Formulaire d'envoi' -->
<h3>TP Creer et consommer un service web Simple REST API en PHP</h3>
<form action="" method="POST">
<label>Enter code capteur:</label><br />
<input type="text" name="CodeCapteur" placeholder="Enter CodeCapteur" required/>
<br /><br />
<label>Enter date:</label><br />
<input type="date" name="Date" placeholder="Enter date" required/>
<br /><br />
<button type="submit" name="submit">Recuperer</button>
</form>
<?php
if ((isset($_POST['CodeCapteur']) && $_POST['CodeCapteur']!="")&& (isset($_POST['Date']) && $_POST['Date']!="") ){
$CodeCapteur = $_POST['CodeCapteur'];
$Date = $_POST['Date'];
$url = "http://localhost/service3.php?CodeCapteur=".$CodeCapteur."&Date=".$Date;
echo $url;

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
echo "<table>";
echo "<tr><td> Id:</td><td>$result->Id</td></tr>";
echo "<tr><td>CodeCapteur:</td><td>$result->CodeCapteur</td></tr>";
echo "<tr><td>Position:</td><td>$result->Position</td></tr>";
echo "<tr><td>Date :</td><td>$result->Date</td></tr>";
echo "<tr><td>Heure:</td><td>$result->Heure</td></tr>";
echo "<tr><td>ValeurCapture:</td><td>$result->ValeurCapture</td></tr>";
echo "</table>";
}
?>

<!-- Liste d'id a titre indicatif : Formulaire d'envoi' -->
<br />
</div>
</body>
</html>