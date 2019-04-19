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
	width: 80%;
	}

    th {
	padding: 0 0.5em;
	text-align: left;
	}

    tr.blue td {
	border: 3px solid #FB7A31;
	background: #FFC;
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
   <li class='active'><a href='#'><span>Home</span></a></li>
   <li><a href='info.php'><span>Incoming Air</span></a></li>
   <li><a href='outfo.php'><span>Outgoing Air</span></a></li>
   <li class='last'><a href='#', onClick="alert('One of the world’s leading problem is air pollution and there are many forms of pollutant that contribute in air pollution. Particulate matter which is the sum of all solid and liquid particles suspended in air many of which are hazardous. This complex mixture includes both organic and inorganic particles, such as dust, pollen, soot, smoke, and liquid droplets.This website monitors the daily value of particulate matter and with the hardware installed along Aguinaldo Highway, users can see progress of the mitigation through this website.')"><span>About</span></a></li>
</ul>
</div>

<div style = "position: relative; top: 60px; width: 75%">
<iframe width="50%" height="260" style="position: absolute; border: 2px solid #00008b;" src="https://thingspeak.com/channels/743613/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=C3JY2CR1I5TT22F1&results=60&type=line&update=15"></iframe>

<iframe width="50%" height="260" style="position: absolute; left: 50%; border: 2px solid #00008b;" src="https://thingspeak.com/channels/743613/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=C3JY2CR1I5TT22F1&results=60&type=line&update=15"></iframe>
</div>

<div style = "position: relative; top: 330px; width: 75%">
<iframe width="450" height="260" style="position: absolute; border: 2px solid #00008b;" src="https://thingspeak.com/channels/754899/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=GVG0HRXKSNZ1IEFH&results=60&type=line&update=15"></iframe>

<iframe width="450" height="260" style="position: absolute; left: 50%; border: 2px solid #00008b;" src="https://thingspeak.com/channels/754899/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key=GVG0HRXKSNZ1IEFH&results=60&type=line&update=15"></iframe>
</div>

<div style = "position: relative; top: 60px; left: 75%">
<table>
  <tr class="blue">
    <td>Hardware</td>
    <td>Status</td> 
  </tr>
<?php
    $jsondata = file_get_contents("https://api.thingspeak.com/channels/743613/feeds.json?api_key=R63HB8RHEB1IUOZF&timezone=Asia/Hong_Kong&results=1");
    $json = json_decode($jsondata, true);

    $timestamp = $json['feeds'][0]['created_at'];

    $divider = explode("T",$timestamp);
    $date = $divider[0];
    $timeset = $divider[1];

    $timefix = explode("+",$timeset);
    $time = $timefix[0];

    $B = date("Y-m-d h:i:s");

    $timeA = strtotime($date.' '.$time);
    $timeB = strtotime($B);

    if(300 > $timeB - $timeA){
        echo '<tr><td>Sensor 1</td><td>Running</td></tr>';
    } else {
        echo '<tr><td>Sensor 1</td><td>Inactive</td></tr>';
    }

     $jsondata = file_get_contents("https://api.thingspeak.com/channels/754899/feeds.json?api_key=PJ2C7CICC344DUVR&timezone=Asia/Hong_Kong&results=1");
    $json = json_decode($jsondata, true);

    $timestamp = $json['feeds'][0]['created_at'];

    $divider = explode("T",$timestamp);
    $date = $divider[0];
    $timeset = $divider[1];

    $timefix = explode("+",$timeset);
    $time = $timefix[0];

    $B = date("Y-m-d h:i:s");

    $timeA = strtotime($date.' '.$time);
    $timeB = strtotime($B);

    if(300 > $timeB - $timeA){
        echo '<tr><td>Sensor 2</td><td>Running</td></tr>';
    } else {
        echo '<tr><td>Sensor 2</td><td>Inactive</td></tr>';
    }    
?>
</table>
</div>
</body>
</html>
