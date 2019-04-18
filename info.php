<!DOCTYPE html>
<html>
<head>
<title>Thesis</title>
<style>
table {
border-collapse: collapse;
width: 60%;
color: #588c7e;
font-family: monospace;
font-size: 20px;
text-align: left;
} 
th {
background-color: #588c7e;
color: white;
}

tr {
background-color: #f2f2f2
}
</style>
</head>
<body style = "background: url(https://lh3.googleusercontent.com/-mxFzH7MEQgs/VLras1EBN3I/AAAAAAAAJWM/otq3uDxbwos/w2048-h1152/adwaita-morning.jpg); background-size: 100%;">

<p>IN SENSOR</p>
<table>
<tr>
<th>PM 10</th> 
<th>PM 2.5</th>
<th>Time</th>
<th>Date</th>
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
</body>
    </html>
