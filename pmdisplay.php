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
         
         $sql="SELECT * FROM insensor ORDER BY id DESC LIMIT 1";
         $result=$conn->query($sql);
         if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
               if ($row["apm25"] < 13){
                  $aqi = $row["apm25"];
                  $aqi = floor($aqi);
                  echo "<h2 style='background-color:chartreuse;'>GOOD</h2>";
                  echo "<h2 style='background-color:chartreuse;'>PM 2.5: " . $aqi. " ug/m3</h2>";
               }else if($row["apm25"] > 12 && $row["apm25"] < 36){
                  $aqi = $row["apm25"];
                  $aqi = floor($aqi);
                  echo "<h2 style='background-color:yellow;'>MODERATE</h2>";
                  echo "<h2 style='background-color:yellow;'>PM 2.5: " . $aqi. " ug/m3</h2>";
                  echo "<p>Unusually sensitive people should consider reducing prolonged or heavy exertion.</p>";
               }else if($row["apm25"] > 35 && $row["apm25"] < 56){
                  $aqi = $row["apm25"];
                  $aqi = floor($aqi);
                  echo "<h2 style='background-color:orange;'>Unhealthy for Sensitive Groups</h2>";
                  echo "<h2 style='background-color:orange;'>PM 2.5: " . $aqi. " ug/m3</h2>";
                  echo "<p>People with respiratory or heart disease, the elderly and children should limit prolonged exertion.</p>";
               }else if($row["apm25"] > 55 && $row["apm25"] < 151){
                  $aqi = $row["apm25"];
                  $aqi = floor($aqi);
                  echo "<h2 style='background-color:red;'>UNHEALTHY</h2>";
                  echo "<h2 style='background-color:red;'>PM 2.5: " . $aqi. " ug/m3</h2>";
                  echo "<p>People with respiratory or heart disease, the elderly and children should avoid prolonged exertion; everyone else should limit prolonged exertion.</p>";
               }else if($row["apm25"] > 150 && $row["apm25"] < 251){
                  $aqi = $row["apm25"];
                  $aqi = floor($aqi);
                  echo "<h2 style='background-color:violet;'>VERY UNHEALTHY</h2>";
                  echo "<h2 style='background-color:violet;'>PM 2.5: " . $aqi. " ug/m3</h2>";
                  echo "<p>People with respiratory or heart disease, the elderly and children should avoid any outdoor activity; everyone else should avoid prolonged exertion.</p>";
               }else{
                  $aqi = $row["apm25"];
                  $aqi = floor($aqi);
                  echo "<h2 style='background-color:brown;'>HAZARDOUS</h2>";
                  echo "<h2 style='background-color:brown;'>PM 2.5: " . $aqi. " ug/m3</h2>";
                  echo "<p>Everyone should avoid any outdoor exertion; people with respiratory or heart disease, the elderly and children should remain indoors.</p>";
               }
            }
         }
      
      ?>
