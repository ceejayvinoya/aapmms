<?php
    //LOGIN TO MYSQL DATABASE
         $servername = "ctgplw90pifdso61.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
         $username = "yfxtv65r19dk2qm0";
         $password = "rkiww4updt427u90";
         $database = "hu1al3cymer6fwfu";
         $conn = new mysqli($servername, $username, $password, $database);
         if($conn->connect_error){
            die("</table> Connection Failed: " . $conn->connect_error);
         }
    //DISPLAY TABLE
        echo "<table style='position: relative; top: 10px; border: 2px solid #00008b' class='w3-table-all'>" 
        echo "<thead>" 
        echo "<tr class='w3-green'>" 
        echo "<th>Incoming (ug/m3)</th>" 
        echo "<th>Outgoing (ug/m3)</th>" 
        echo "<th>Time</th>" 
        echo "</tr>" 
        echo "</thead>" 
         $sql="SELECT * FROM insensor ORDER BY id DESC LIMIT 40";
         $result=$conn->query($sql);
         if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
               echo "<tr class='w3-teal'><td>" . $row["apm25"]. "</td><td>" . $row["bpm25"]. "</td><td>" . $row["time"]. "</td></tr>";
         }
         echo "</table>";
      } else { echo "0 results"; }
      //echo $res;
      $conn->close();
      ?>
