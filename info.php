<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>AAPMMS - DLSUD</title>
</head>
<style>

    table {
	font: 18px/28px Verdana, Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 640px;
	}

    th {
	padding: 0 0.5em;
	text-align: left;
	}

    tr.blue td {
	border: 3px solid #FB7A31;
	background: #FFC;
	max-width: 100%;
	}

    td {
	border: 3px solid #CCC;
	padding: 0 0.5em;
    text-align: center;
	}

</style>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li class='active'><a href='#'><span>Incoming Air</span></a></li>
   <li><a href='outfo.php'><span>Outgoing Air</span></a></li>
   <li><a href='status.php'><span>Status Update</span></a></li>
   <li class='last'><a href='#', onClick="alert('One of the world’s leading problem is air pollution and there are many forms of pollutant that contribute in air pollution. Particulate matter which is the sum of all solid and liquid particles suspended in air many of which are hazardous. This complex mixture includes both organic and inorganic particles, such as dust, pollen, soot, smoke, and liquid droplets.This website monitors the daily value of particulate matter and with the hardware installed along Aguinaldo Highway, users can see progress of the mitigation through this website.')"><span>About</span></a></li>
</ul>
</div>

<div>
<table>
<tr>
<th colspan="4">Incoming Air PM Sensor</th>
</tr>
<tr class="blue">
<td>PM 10</td> 
<td>PM 2.5</td>
<td>Time</td>
<td>Date</td>
</tr>    

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

    $jsondata = file_get_contents("https://api.thingspeak.com/channels/743613/feeds.json?api_key=R63HB8RHEB1IUOZF&timezone=Asia/Hong_Kong&results=10");
    $json = json_decode($jsondata, true);
    
    //DECODE AND SORT DATA INTO SENSOR VALUES AND TIMESTAMPS

    for($x = 0; $x < 10; $x++) {
        $apm10 = $json['feeds'][$x]['field1'];
        $apm25 = $json['feeds'][$x]['field2'];

        $timestamp = $json['feeds'][$x]['created_at'];

        $divider = explode("T",$timestamp);
        $date = $divider[0];
        $timeset = $divider[1];

        $timefix = explode("+",$timeset);
        $time = $timefix[0];

        //CHECK IF LATEST DATA IS ALREADY ON DATABASE

        $sql = "SELECT * FROM insensor WHERE time = '$time' AND date = '$date'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
        
        //DO NOTHING IF THE DATABASE IS ALREADY UPDATED

        } else {
            //ELSE IF DATA IS NOT UPDATED, INSERT UPDATED DATA TO DATABASE
          
                $sql="INSERT INTO insensor (apm10, apm25, time, date)
                VALUES
                ('$apm10','$apm25','$time','$date')";
    
                if($conn->query($sql)!==TRUE){
                    echo "</table> Error: " . $sql . "<br>" . $conn->error;
                }
            
        }
    }

    //DISPLAY TABLE

    $sql="SELECT * FROM insensor ORDER BY id DESC LIMIT 10";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()) {
            echo "<tr><td>" . $row["apm10"]. "</td><td>" . $row["apm25"]. "</td><td>" . $row["time"]. "</td><td>" . $row["date"]."</td></tr>";
        }
        echo "</table>";
    } else { echo "0 results"; }

    $conn->close();
    ?>
</div>
</body>
</html>
