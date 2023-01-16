<!-- Partie 1 : Formulaire d'envoi -->
<html>
<body>
<div style="width:700px; margin:0 auto;">
<!-- Partie 1 : Formulaire d'envoi' -->
<h3>TP Creer et consommer un service web Simple REST API en PHP</h3>
<form action="" method="POST">
<label>Enter code:</label><br />
<input type="text" name="CodeCapteur" placeholder="Enter code" required/> 
<br/><br />
<input type="text" name="Position" placeholder="Enter position" required/>
<br /><br />

<button type="submit" name="submit">Recuperer</button>
</form>
<?php
if ((isset($_POST['CodeCapteur']) && $_POST['CodeCapteur']!="")&&(isset($_POST['Position']) && $_POST['Position']!="")) {
$CodeCapteur = $_POST['CodeCapteur'];
$Position = $_POST['Position'];
$url = "http://localhost/service5.php?CodeCapteur=".$CodeCapteur."&Position=".$Position;
echo $url;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
echo $response;
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