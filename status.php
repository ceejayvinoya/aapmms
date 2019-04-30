<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="statscript.js"></script>
   <title>AAPMMS - DLSUD</title>
</head>

<body class="w3-teal">

<div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
   <li><a href='info.php'><span>Incoming Air</span></a></li>
   <li><a href='outfo.php'><span>Outgoing Air</span></a></li>
   <li class='active'><a href='#'><span>Status Update</span></a></li>
   <li class='last'><a href='about.html'><span>About</span></a></li>
   </ul>
</div>


<div id="statupdate" class="w3-container w3-teal" style = "position: relative; top: 10px; width: 100%">
<table style="width: 320px" class="w3-table-all">
  <tr class="w3-green">
    <td>Hardware</td>
    <td>Status</td>
  </tr>
<?php
    $jsondata = file_get_contents("https://api.thingspeak.com/channels/743613/feeds.json?api_key=R63HB8RHEB1IUOZF&results=1");
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
        echo '<tr class="w3-teal"><td>Sensor 1</td><td>Running</td></tr>';
    } else {
        echo '<tr class="w3-teal"><td>Sensor 1</td><td>Inactive</td></tr>';
    }
     $jsondata = file_get_contents("https://api.thingspeak.com/channels/754899/feeds.json?api_key=PJ2C7CICC344DUVR&results=1");
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
        echo '<tr class="w3-teal"><td>Sensor 2</td><td>Running</td></tr>';
    } else {
        echo '<tr class="w3-teal"><td>Sensor 2</td><td>Inactive</td></tr>';
    }
   $jsondata = file_get_contents("https://api.thingspeak.com/channels/769993/feeds.json?api_key=4LWAS8YZEWE9FFB8&results=1");
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
        echo '<tr class="w3-teal"><td>Sensor 3</td><td>Running</td></tr>';
    } else {
        echo '<tr class="w3-teal"><td>Sensor 3</td><td>Inactive</td></tr>';
    }
?>
</table>
</div>
<form method="get">
<div class="w3-container w3-teal" style = "position: relative; top: 30px;">
<button class="w3-btn w3-aqua" type="button" id="refresh">Refresh</button>
</div>
</form>

</body>
</html>
