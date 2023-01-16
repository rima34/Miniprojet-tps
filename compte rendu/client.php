<!-- Partie 1 : Formulaire d'envoi -->
<html> 
    <body>
         <div style="width:700px; margin:0 auto;">
          <!-- Partie 1 : Formulaire d'envoi' -->
           <h3>TP Creer et consommer un service web Simple REST API en PHP</h3> 
                 <form action="" method="POST"> <label>Enter  ID:</label><br />
                      <input type="text" name="Id" placeholder="Enter your ID" required/> <br /><br /> 
                       <button type="submit" name="submit">Recuperer</button> 
                 </form>

                 <!-- Partie 2 : Appeler le service -->
     <?php 
     if (isset($_POST['Id']) && $_POST['Id']!="")
      { $Id = $_POST['Id'];
         $url = "http://localhost/service.php?Id=".$Id; 
         $client = curl_init($url);
          curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
           $response = curl_exec($client); 
           $result = json_decode($response);
            echo "<table>";
              echo "<tr><td>capteur:</td><td>$result->CodeCapteur</td></tr>";
              echo "<tr><td>position:</td><td>$result->Position</td></tr>";
               echo "<tr><td>date:</td><td>$result->Date</td></tr>"; 
               echo "<tr><td>heure:</td><td>$result->Heure</td></tr>";
               echo "<tr><td>valeur:</td><td>$result->ValeurCapture</td></tr>";
                echo "</table>"; } 
                ?>
                </body> 
                </html>