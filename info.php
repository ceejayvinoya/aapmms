<!doctype html>
<html lang=''>
   
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="w3.css">
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="infoscript.js"></script>
   
   <title>AAPMMS - DLSUD</title>
</head>
   
<body class="w3-khaki">
   <div id='cssmenu'>
      <ul>
         <li><a href='index.php'><span>Home</span></a></li>
         <li class='active'><a href='#'><span>Table</span></a></li>
         <li class='last'><a href='about.html'><span>About</span></a></li>
      </ul>
   </div>
   
   <div class="w3-container w3-khaki">
      <br>
<label>Input Date:</label><br>
<input class="w3-input w3-border" type="text" id="date" style="width: 320px" placeholder="yyyy-mm-dd">
<br>	
   </div>
   
   <div class="w3-container" style="position: relative">
   <form method="post" style="display: inline-block">
<button class="w3-btn w3-lime" type="button" id="submit">Submit</button>

</form>
   
   <form method="get" style="display: inline-block">
   <button class="w3-btn w3-lime" type="button" id="refresh">Refresh</button>
   </form>
</div>
      
   <div id="result" class="w3-container w3-khaki" style = "position: relative; top: 10px;">
      <table style="position: relative; top: 10px; border: 2px solid #00008b" class="w3-table-all">
         <thead>
            <tr class="w3-green">
               <th>Incoming (ug/m3)</th>
               <th>Outgoing (ug/m3)</th>
               <th>Time</th>
            </tr>    
         </thead>

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
         $sql="SELECT * FROM insensor ORDER BY time DESC LIMIT 30";
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
      </div>
<br>
</body>
</html>
