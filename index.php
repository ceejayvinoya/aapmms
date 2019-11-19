<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="w3.css">
   <script type="text/javascript" src="jquery.min.js"></script>
   <script type="text/javascript" src="chart.min.js"></script>
   <script type="text/javascript" src="app.js"></script>
   <title>AAPMMS - DLSUD</title>
   <style type="text/css">
      #chart-container {
        width: 60%;
        float: left;
        position: relative;
        height: 360px;
        margin: 25px;
        padding: 20px;
        border: 3px solid blue;
        background-color: white;
      }
      #aqi-container {
         width: 30%;
         float: right;
         position: relative;
         height: 360px;
         margin: 25px;
         padding: 20px;
         border: 3px solid green;
         background-color: white;
      }
      body {
        background-color: khaki;
      }
      h2 {
        text-align: center;
      }
    </style>
</head>

<body onLoad="buildHtmlTable()">

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='info.php'><span>Tables</span></a></li>
   <li class='last'><a href='about.html'><span>About</span></a></li>
</ul>
</div>
<div>
   <h2>Automated Air Pollution Monitoring and Mitigation System</h2>
   </div>
<div id="chart-container">
   <canvas id="mycanvas"></canvas>
   </div>
   <div id="aqi-container">
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
                  $aqi = 4.17 * $row["apm25"];
                  echo "<h2 style='background-color:chartreuse;'>GOOD</h2>";
                  echo "<h2 style='background-color:chartreuse;'>" . $aqi. "</h2>";
               }else if($row["apm25"] > 12 && $row["apm25"] < 36){
                  $aqi = 2.1 * ($row["apm25"] - 12.1) + 51;
                  echo "<h2 style='background-color:yellow;'>MODERATE</h2>";
                  echo "<h2 style='background-color:yellow;'>" . $aqi. "</h2>";
                  echo "<p>Unusually sensitive people should consider reducing prolonged or heavy exertion.</p>";
               }else if($row["apm25"] > 35 && $row["apm25"] < 56){
                  $aqi = 2.46 * ($row["apm25"] - 35.5) + 101;
                  echo "<h2 style='background-color:orange;'>Unhealthy for Sensitive Groups</h2>";
                  echo "<h2 style='background-color:orange;'>" . $aqi. "</h2>";
                  echo "<p>People with respiratory or heart disease, the elderly and children should limit prolonged exertion.</p>";
               }else if($row["apm25"] > 55 && $row["apm25"] < 151){
                  $aqi = 0.52 * ($row["apm25"] - 55.5) + 151;
                  echo "<h2 style='background-color:red;'>UNHEALTHY</h2>";
                  echo "<h2 style='background-color:red;'>" . $aqi. "</h2>";
                  echo "<p>People with respiratory or heart disease, the elderly and children should avoid prolonged exertion; everyone else should limit prolonged exertion.</p>";
               }else if($row["apm25"] > 150 && $row["apm25"] < 251){
                  $aqi = ($row["apm25"] - 150.5) + 201;
                  echo "<h2 style='background-color:violet;'>VERY UNHEALTHY</h2>";
                  echo "<h2 style='background-color:violet;'>" . $aqi. "</h2>";
                  echo "<p>People with respiratory or heart disease, the elderly and children should avoid any outdoor activity; everyone else should avoid prolonged exertion.</p>";
               }else{
                  $aqi = 0.67 * ($row["apm25"] - 350.5) + 401;
                  echo "<h2 style='background-color:brown;'>HAZARDOUS</h2>";
                  echo "<h2 style='background-color:brown;'>" . $aqi. "</h2>";
                  echo "<p>Everyone should avoid any outdoor exertion; people with respiratory or heart disease, the elderly and children should remain indoors.</p>";
               }
            }
         }
      
      ?>
   </div>
   <br>
   <br>
</body>
</html>
