<!doctype html>
<html lang=''>
   
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="outfoscript.js"></script>
   <script src="outforefresh.js"></script>
   <title>AAPMMS - DLSUD</title>
</head>
   
<body class="w3-teal">
   <div id='cssmenu'>
      <ul>
         <li><a href='index.php'><span>Home</span></a></li>
         <li><a href='info.php'><span>Incoming Air</span></a></li>
         <li class='active'><a href='#'><span>Outgoing Air</span></a></li>
         <li><a href='status.php'><span>Status Update</span></a></li>
         <li class='last'><a href='about.html'><span>About</span></a></li>
      </ul>
   </div>
   <div class="w3-container w3-teal">
      <h2>Outgoing Air PM Data</h2>
      <p>This page logs all data gathered by the Outgoing Air PM sensor within the past hour. You can also get the data from a specific date and hour using the fields below.</p>

   </div>
   
   <div class="w3-container">
<label>Input Hour:</label><br>
<input class="w3-input w3-border" type="text" id="time" style="width: 320px" placeholder="0 to 23, Military Time">
<br><label>Input Date:</label><br>
<input class="w3-input w3-border" type="text" id="date" style="width: 320px" placeholder="yyyy-mm-dd">
<br>	
   </div>
   
   <div class="w3-container" style="position: relative">
   <form method="post" style="display: inline-block">
<button class="w3-btn w3-aqua" type="button" id="submit">Submit</button>

</form>
   
   <form method="get" style="display: inline-block">
   <button class="w3-btn w3-aqua" type="button" id="refresh">Refresh</button>
   </form>
</div>
      
   <div id="result" class="w3-container w3-teal" style = "position: relative; top: 10px;">
      <table style="width: 320px; position: relative; top: 10px; border: 2px solid #00008b" class="w3-table-all">
         <thead>
            <tr class="w3-green">
               <th>PM10</th> 
               <th>PM2.5</th>
               <th>Time</th>
               <th>Date</th>
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
    //OBTAIN SENSOR DATA FROM THINGSPEAK
         $jsondata = file_get_contents("https://api.thingspeak.com/channels/769993/feeds.json?api_key=4LWAS8YZEWE9FFB8&timezone=Asia/Hong_Kong&results=1");
         $json = json_decode($jsondata, true);
    
         $test = $json['feeds'][0]['entry_id'];
         $res = $test;
         $page = 'https://api.thingspeak.com/channels/769993/feeds.json?api_key=4LWAS8YZEWE9FFB8&timezone=Asia/Hong_Kong&results=';
         $jsondata = file_get_contents($page.$res);
         $json = json_decode($jsondata, true);
    //DECODE AND SORT DATA INTO SENSOR VALUES AND TIMESTAMPS
         for($x = 0; $x < $res; $x++) {
            $bpm10 = $json['feeds'][$x]['field1'];
            $bpm25 = $json['feeds'][$x]['field2'];
            $entry_id = $json['feeds'][$x]['entry_id'];
            $timestamp = $json['feeds'][$x]['created_at'];
            $divider = explode("T",$timestamp);
            $date = $divider[0];
            $timeset = $divider[1];
            $timefix = explode("+",$timeset);
            $time = $timefix[0];
        //CHECK IF LATEST DATA IS ALREADY ON DATABASE
            $sql = "SELECT * FROM outsensor WHERE time = '$time' AND date = '$date'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
        //DO NOTHING IF THE DATABASE IS ALREADY UPDATED
            } else {
            //ELSE IF DATA IS NOT UPDATED, INSERT UPDATED DATA TO DATABASE
               $sql="INSERT INTO outsensor (bpm10, bpm25, time, date, entry_id)
                VALUES
                ('$bpm10','$bpm25','$time','$date','$entry_id')";
    
                if($conn->query($sql)!==TRUE){
                    echo "</table> Error: " . $sql . "<br>" . $conn->error;
                }
            
            }
         }
    //DISPLAY TABLE
         $sql="SELECT * FROM outsensor ORDER BY date DESC, time DESC LIMIT 30";
         $result=$conn->query($sql);
         if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
               echo "<tr class='w3-teal'><td>" . $row["bpm10"]. "</td><td>" . $row["bpm25"]. "</td><td>" . $row["time"]. "</td><td>" . $row["date"]."</td></tr>";
         }
         echo "</table>";
      } else { echo "0 results"; }
      //echo $res;
      $conn->close();
      ?>
      </div>

</body>
</html>

