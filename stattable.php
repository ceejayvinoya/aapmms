<?php
echo '<table style="width: 320px" class="w3-table-all">';
echo '<tr class="w3-green">';
echo '<td>Hardware</td>';
echo '<td>Status</td></tr>';
    
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
        echo '<tr class="w3-teal"><td>Incoming Sensor</td><td>Running</td></tr>';
    } else {
        echo '<tr class="w3-teal"><td>Incoming Sensor</td><td>Inactive</td></tr>';
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
        echo '<tr class="w3-teal"><td>Outgoing Sensor</td><td>Running</td></tr>';
    } else {
        echo '<tr class="w3-teal"><td>Outgoing Sensor</td><td>Inactive</td></tr>';
    }
?>
