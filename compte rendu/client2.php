<!-- Partie 1 : Formulaire d'envoi -->
<html>
<body>
<div style="width:700px; margin:0 auto;">
<!-- Partie 1 : Formulaire d'envoi' -->
<h3>TP Creer et consommer un service web Simple REST API en PHP</h3>
<form action="" method="POST">
<label>Enter ID:</label><br />
<input type="text" name="id" placeholder="Enter ID" required/>
<br /><br />
<button type="submit" name="submit">Recuperer</button>
</form>
<?php
if (isset($_POST['id']) && $_POST['id']!="") {
$Id = $_POST['id'];
$url = "http://localhost/service2.php?id=".$Id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
echo "<table>";
echo "<tr><td> Id:</td><td>$result->id</td></tr>";
echo "<tr><td>CodeCapteur:</td><td>$result->val1</td></tr>";
echo "<tr><td>Position:</td><td>$result->val2</td></tr>";
echo "<tr><td>Date :</td><td>$result->val3</td></tr>";
echo "<tr><td>Heure:</td><td>$result->val4</td></tr>";
echo "<tr><td>ValeurCapture:</td><td>$result->val5</td></tr>";
echo "</table>";
}
?>

<!-- Liste d'id a titre indicatif : Formulaire d'envoi' -->
<br />
</div>
</body>
</html>